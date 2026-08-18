<?php

namespace App\Services;

use App\DTO\ClaimData;
use App\Enums\ClaimStatus;
use App\Events\ClaimCreated;
use App\Exceptions\DuplicateClaimException;
use App\Exceptions\OfferNotClaimableException;
use App\Interfaces\ClaimRepositoryInterface;
use App\Interfaces\OfferRepositoryInterface;
use App\Models\Claim;
use App\Models\Offer;
use App\Models\User;
use App\Notifications\OfferNearingClaimLimitNotification;
use Illuminate\Support\Facades\DB;

/**
 * Orchestrates the entire claim flow:
 * validate offer -> block duplicates -> issue coupon + QR -> persist ->
 * increment counters -> dispatch ClaimCreated (queues email, logs activity).
 */
class ClaimService
{
    public function __construct(
        protected OfferRepositoryInterface $offers,
        protected ClaimRepositoryInterface $claims,
        protected CouponService $couponService,
    ) {
    }

    public function createClaim(ClaimData $data): Claim
    {
        $offer = $this->offers->find($data->offerId);

        $this->assertClaimable($offer);
        $this->assertNotDuplicate($offer, $data->email);

        $claim = DB::transaction(function () use ($offer, $data) {
            $coupon = $this->couponService->issue($offer);

            $claim = $this->claims->create([
                'offer_id' => $offer->id,
                'screen_id' => $data->screenId,
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'coupon_code' => $coupon->code,
                'qr_code_path' => $coupon->qrCodePath,
                'status' => ClaimStatus::Claimed,
                'expires_at' => $coupon->expiresAt,
                'ip_address' => $data->ipAddress,
                'user_agent' => $data->userAgent,
            ]);

            $offer->increment('claims_count');

            return $claim;
        });

        $claim->load('offer.advertiser');

        ClaimCreated::dispatch($claim);

        $this->notifyIfNearingLimit($offer->refresh());

        return $claim;
    }

    protected function notifyIfNearingLimit(Offer $offer): void
    {
        if (! $offer->max_claims) {
            return;
        }

        $threshold = (int) ceil($offer->max_claims * 0.9);

        if ($offer->claims_count === $threshold) {
            User::query()->where('is_active', true)->get()
                ->each(fn (User $admin) => $admin->notify(new OfferNearingClaimLimitNotification($offer)));
        }
    }

    protected function assertClaimable(?Offer $offer): void
    {
        if (! $offer) {
            throw OfferNotClaimableException::inactive();
        }

        if (! $offer->isClaimable()) {
            if ($offer->starts_at?->isFuture()) {
                throw OfferNotClaimableException::notStarted();
            }

            if ($offer->ends_at?->isPast()) {
                throw OfferNotClaimableException::ended();
            }

            if ($offer->max_claims !== null && $offer->claims_count >= $offer->max_claims) {
                throw OfferNotClaimableException::limitReached();
            }

            throw OfferNotClaimableException::inactive();
        }
    }

    protected function assertNotDuplicate(Offer $offer, string $email): void
    {
        $windowHours = (int) config('coupon.claim.duplicate_window_hours', 24);

        if ($this->claims->existingClaim($offer->id, $email, $windowHours)) {
            throw new DuplicateClaimException;
        }
    }
}
