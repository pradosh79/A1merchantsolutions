<?php

namespace App\Listeners;

use App\Enums\ActivityType;
use App\Events\OfferInteracted;
use App\Interfaces\ActivityLogRepositoryInterface;

class LogOfferInteraction
{
    public function __construct(protected ActivityLogRepositoryInterface $activityLogs)
    {
    }

    public function handle(OfferInteracted $event): void
    {
        $type = $event->interaction === 'tap' ? ActivityType::OfferTap : ActivityType::OfferClick;

        $this->activityLogs->log($type->value, [
            'subject_type' => $event->offer::class,
            'subject_id' => $event->offer->id,
            'offer_id' => $event->offer->id,
            'screen_id' => $event->screen?->id,
            'advertiser_id' => $event->offer->advertiser_id,
            'ip_address' => $event->ipAddress,
            'user_agent' => $event->userAgent,
        ]);
    }
}
