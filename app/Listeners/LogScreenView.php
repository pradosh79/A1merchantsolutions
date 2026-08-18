<?php

namespace App\Listeners;

use App\Enums\ActivityType;
use App\Events\ScreenViewed;
use App\Interfaces\ActivityLogRepositoryInterface;

class LogScreenView
{
    public function __construct(protected ActivityLogRepositoryInterface $activityLogs)
    {
    }

    public function handle(ScreenViewed $event): void
    {
        $context = [
            'subject_type' => $event->screen::class,
            'subject_id' => $event->screen->id,
            'screen_id' => $event->screen->id,
            'ip_address' => $event->ipAddress,
            'user_agent' => $event->userAgent,
        ];

        // A physical /s/{screen} hit is both the QR scan and the arrival at
        // the screen, so record both funnel facts. This makes the admin
        // dashboard's `todays_arrivals` widget (AnalyticsService::dashboard,
        // ActivityType::ScreenArrival) reflect reality instead of always 0.
        //
        // NOTE: if a distinct arrival signal is ever added (e.g. a beacon or
        // dwell-time sensor, per PROJECT_ANALYSIS §7), move the ScreenArrival
        // write to that source and drop it from here.
        $this->activityLogs->log(ActivityType::QrScan->value, $context);
        $this->activityLogs->log(ActivityType::ScreenArrival->value, $context);
    }
}
