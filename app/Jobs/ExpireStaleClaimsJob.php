<?php

namespace App\Jobs;

use App\Enums\ClaimStatus;
use App\Models\Claim;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Housekeeping job: flips any claim whose expires_at has passed from
 * "claimed" to "expired" so redemption + reporting reflect reality even
 * for coupons nobody ever attempted to scan. Intended to run hourly via
 * routes/console.php schedule.
 */
class ExpireStaleClaimsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        Claim::query()
            ->where('status', ClaimStatus::Claimed)
            ->where('expires_at', '<', now())
            ->chunkById(500, function ($claims) {
                foreach ($claims as $claim) {
                    $claim->update(['status' => ClaimStatus::Expired]);
                }
            });
    }
}
