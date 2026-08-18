<?php

namespace App\Providers;

use App\Models\Advertiser;
use App\Models\Claim;
use App\Models\Offer;
use App\Models\Screen;
use App\Policies\AdvertiserPolicy;
use App\Policies\ClaimPolicy;
use App\Policies\OfferPolicy;
use App\Policies\ScreenPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Advertiser::class => AdvertiserPolicy::class,
        Offer::class => OfferPolicy::class,
        Screen::class => ScreenPolicy::class,
        Claim::class => ClaimPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
