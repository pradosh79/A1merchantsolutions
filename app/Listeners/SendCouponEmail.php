<?php

namespace App\Listeners;

use App\Enums\ActivityType;
use App\Events\ClaimCreated;
use App\Interfaces\ActivityLogRepositoryInterface;
use App\Mail\CouponIssuedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Queued listener: sends the coupon email asynchronously so the public
 * claim endpoint responds instantly regardless of mail transport latency.
 */
class SendCouponEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public int $tries = 3;

    public int $backoff = 30;

    public function __construct(protected ActivityLogRepositoryInterface $activityLogs)
    {
    }

    public function handle(ClaimCreated $event): void
    {
        $claim = $event->claim;

        try {
            Mail::to($claim->email)->send(new CouponIssuedMail($claim));

            $this->activityLogs->log(ActivityType::CouponEmailSent->value, [
                'subject_type' => $claim::class,
                'subject_id' => $claim->id,
                'offer_id' => $claim->offer_id,
                'claim_id' => $claim->id,
                'meta' => ['email' => $claim->email],
            ]);
        } catch (\Throwable $e) {
            Log::error('Coupon email failed to send', ['claim_id' => $claim->id, 'error' => $e->getMessage()]);

            $this->activityLogs->log(ActivityType::CouponEmailFailed->value, [
                'subject_type' => $claim::class,
                'subject_id' => $claim->id,
                'offer_id' => $claim->offer_id,
                'claim_id' => $claim->id,
                'meta' => ['email' => $claim->email, 'error' => $e->getMessage()],
            ]);

            throw $e; // allow queue retry/backoff to kick in
        }
    }
}
