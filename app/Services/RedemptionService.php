<?php

namespace App\Services;

use App\Actions\BurnCouponAction;
use App\DTO\RedemptionData;
use App\Enums\RedemptionResult;
use App\Events\RedemptionAttempted;
use App\Exceptions\InvalidMerchantTokenException;
use App\Interfaces\AdvertiserRepositoryInterface;
use App\Models\Advertiser;

/**
 * Merchant-facing redemption: validate the advertiser token, burn the
 * coupon exactly once (race-safe), and return a standardized result the
 * scanner UI can render as VALID / ALREADY REDEEMED / NOT FOUND / EXPIRED.
 */
class RedemptionService
{
    public function __construct(
        protected AdvertiserRepositoryInterface $advertisers,
        protected BurnCouponAction $burnCoupon,
    ) {
    }

    public function resolveAdvertiser(string $token): Advertiser
    {
        $advertiser = $this->advertisers->findByToken($token);

        if (! $advertiser || $advertiser->status->value !== 'active') {
            throw new InvalidMerchantTokenException;
        }

        return $advertiser;
    }

    public function redeem(Advertiser $advertiser, string $couponCode, ?string $redeemedBy = null, ?string $ip = null, ?string $ua = null): RedemptionData
    {
        $outcome = ($this->burnCoupon)($couponCode, $advertiser->id, $redeemedBy);

        $claimArray = $outcome['claim'] ? [
            'id' => $outcome['claim']->id,
            'uuid' => $outcome['claim']->uuid,
            'offer_id' => $outcome['claim']->offer_id,
            'offer_title' => $outcome['claim']->offer?->title,
            'name' => $outcome['claim']->name,
            'status' => $outcome['claim']->status->value,
            'redeemed_at' => optional($outcome['claim']->redeemed_at)->toIso8601String(),
            'expires_at' => optional($outcome['claim']->expires_at)->toIso8601String(),
        ] : null;

        $data = RedemptionData::fromResult($outcome['result'], $claimArray);

        RedemptionAttempted::dispatch($advertiser, $data, $couponCode, $ip, $ua);

        return $data;
    }
}
