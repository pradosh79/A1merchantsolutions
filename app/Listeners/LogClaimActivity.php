<?php

namespace App\Listeners;

use App\Enums\ActivityType;
use App\Events\ClaimCreated;
use App\Helpers\MaskHelper;
use App\Interfaces\ActivityLogRepositoryInterface;

class LogClaimActivity
{
    public function __construct(protected ActivityLogRepositoryInterface $activityLogs)
    {
    }

    public function handle(ClaimCreated $event): void
    {
        $claim = $event->claim;

        $this->activityLogs->log(ActivityType::CouponClaim->value, [
            'subject_type' => $claim::class,
            'subject_id' => $claim->id,
            'offer_id' => $claim->offer_id,
            'screen_id' => $claim->screen_id,
            'advertiser_id' => $claim->offer?->advertiser_id,
            'claim_id' => $claim->id,
            'ip_address' => $claim->ip_address,
            'user_agent' => $claim->user_agent,
            'meta' => ['coupon_code_masked' => MaskHelper::couponCode($claim->getRawOriginal('coupon_code'))],
        ]);
    }
}
