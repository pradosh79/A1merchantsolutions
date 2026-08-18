<?php

namespace App\Events;

use App\DTO\RedemptionData;
use App\Models\Advertiser;
use Illuminate\Foundation\Events\Dispatchable;

class RedemptionAttempted
{
    use Dispatchable;

    public function __construct(
        public Advertiser $advertiser,
        public RedemptionData $data,
        public string $submittedCode,
        public ?string $ipAddress = null,
        public ?string $userAgent = null,
    ) {
    }
}
