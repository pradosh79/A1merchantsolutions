<?php

namespace App\Events;

use App\Models\Screen;
use Illuminate\Foundation\Events\Dispatchable;

class ScreenViewed
{
    use Dispatchable;

    public function __construct(
        public Screen $screen,
        public ?string $ipAddress = null,
        public ?string $userAgent = null,
    ) {
    }
}
