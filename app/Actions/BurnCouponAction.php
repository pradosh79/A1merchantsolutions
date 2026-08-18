<?php

namespace App\Actions;

use App\Enums\ClaimStatus;
use App\Enums\RedemptionResult;
use App\Models\Claim;
use Illuminate\Support\Facades\DB;

/**
 * Atomically transitions a claim to "redeemed", guarding against the
 * classic double-scan race condition with a row-level lock inside a
 * transaction (SELECT ... FOR UPDATE).
 */
class BurnCouponAction
{
    /**
     * @return array{result: RedemptionResult, claim: ?Claim}
     */
    public function __invoke(string $couponCode, int $advertiserId, ?string $redeemedBy = null): array
    {
        return DB::transaction(function () use ($couponCode, $advertiserId, $redeemedBy) {
            /** @var Claim|null $claim */
            $claim = Claim::withoutGlobalScopes()
                ->with('offer.advertiser')
                ->where('coupon_code', strtoupper(trim($couponCode)))
                ->lockForUpdate()
                ->first();

            if (! $claim) {
                return ['result' => RedemptionResult::NotFound, 'claim' => null];
            }

            if ($claim->offer->advertiser_id !== $advertiserId) {
                // Coupon exists but does not belong to this merchant's advertiser scope.
                return ['result' => RedemptionResult::NotFound, 'claim' => null];
            }

            if ($claim->status === ClaimStatus::Redeemed) {
                return ['result' => RedemptionResult::AlreadyRedeemed, 'claim' => $claim];
            }

            if ($claim->status === ClaimStatus::Expired || $claim->expires_at->isPast()) {
                if ($claim->status !== ClaimStatus::Expired) {
                    $claim->update(['status' => ClaimStatus::Expired]);
                }

                return ['result' => RedemptionResult::Expired, 'claim' => $claim];
            }

            $claim->update([
                'status' => ClaimStatus::Redeemed,
                'redeemed_at' => now(),
                'redeemed_by' => $redeemedBy,
            ]);

            $claim->offer()->increment('redemptions_count');

            return ['result' => RedemptionResult::Valid, 'claim' => $claim->refresh()];
        });
    }
}
