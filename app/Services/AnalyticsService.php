<?php

namespace App\Services;

use App\Enums\ActivityType;
use App\Interfaces\ActivityLogRepositoryInterface;
use App\Interfaces\AdvertiserRepositoryInterface;
use App\Interfaces\ClaimRepositoryInterface;
use App\Interfaces\OfferRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Aggregates the numbers behind every admin dashboard widget in one place.
 * Controllers should never compute counts/aggregates directly.
 */
class AnalyticsService
{
    public function __construct(
        protected ClaimRepositoryInterface $claims,
        protected OfferRepositoryInterface $offers,
        protected AdvertiserRepositoryInterface $advertisers,
        protected ActivityLogRepositoryInterface $activityLogs,
    ) {
    }

    public function dashboard(): array
    {
        return [
            'todays_claims' => $this->claims->countToday(),
            'todays_redemptions' => $this->claims->countRedeemedToday(),
            'todays_qr_scans' => $this->activityLogs->countByType(
                ActivityType::QrScan->value,
                now()->startOfDay()->toDateTimeString(),
                now()->endOfDay()->toDateTimeString(),
            ),
            'todays_arrivals' => $this->activityLogs->countByType(
                ActivityType::ScreenArrival->value,
                now()->startOfDay()->toDateTimeString(),
                now()->endOfDay()->toDateTimeString(),
            ),
            'todays_taps' => $this->activityLogs->countByType(
                ActivityType::OfferTap->value,
                now()->startOfDay()->toDateTimeString(),
                now()->endOfDay()->toDateTimeString(),
            ),
            'offer_performance' => $this->offers->performance(),
            'top_advertisers' => $this->advertisers->topByClaims(5),
            'claims_series' => $this->activityLogs->dailySeries(ActivityType::CouponClaim->value, 14),
            'redemptions_series' => $this->activityLogs->dailySeries(ActivityType::RedemptionSuccess->value, 14),
            'qr_scans_series' => $this->activityLogs->dailySeries(ActivityType::QrScan->value, 14),
        ];
    }

    public function offerConversion(): Collection
    {
        return $this->offers->performance();
    }

    public function couponLogs(int $perPage = 25)
    {
        return $this->activityLogs->paginateByType([
            ActivityType::CouponClaim->value,
            ActivityType::CouponEmailSent->value,
            ActivityType::CouponEmailFailed->value,
        ], $perPage);
    }

    public function redemptionLogs(int $perPage = 25)
    {
        return $this->activityLogs->paginateByType([
            ActivityType::RedemptionSuccess->value,
            ActivityType::RedemptionFailed->value,
            ActivityType::ValidationFailure->value,
        ], $perPage);
    }
}
