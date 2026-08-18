<?php

namespace App\Listeners;

use App\Enums\ActivityType;
use App\Enums\RedemptionResult;
use App\Events\RedemptionAttempted;
use App\Interfaces\ActivityLogRepositoryInterface;

class LogRedemptionActivity
{
    public function __construct(protected ActivityLogRepositoryInterface $activityLogs)
    {
    }

    public function handle(RedemptionAttempted $event): void
    {
        $result = $event->data->result;
        $claim = $event->data->claim;

        $type = match ($result) {
            RedemptionResult::Valid => ActivityType::RedemptionSuccess,
            RedemptionResult::NotFound, RedemptionResult::InvalidToken => ActivityType::ValidationFailure,
            default => ActivityType::RedemptionFailed,
        };

        $this->activityLogs->log($type->value, [
            'advertiser_id' => $event->advertiser->id,
            'claim_id' => $claim['id'] ?? null,
            'offer_id' => $claim['offer_id'] ?? null,
            'ip_address' => $event->ipAddress,
            'user_agent' => $event->userAgent,
            'meta' => [
                'result' => $result->value,
                'submitted_code' => strtoupper($event->submittedCode),
            ],
        ]);
    }
}
