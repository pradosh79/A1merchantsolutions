<?php

namespace App\Events;

use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Foundation\Events\Dispatchable;

class OfferInteracted
{
    use Dispatchable;

    /**
     * @param  string  $interaction  'click'|'tap'
     */
    public function __construct(
        public Offer $offer,
        public ?Screen $screen,
        public string $interaction,
        public ?string $ipAddress = null,
        public ?string $userAgent = null,
    ) {
    }
}
