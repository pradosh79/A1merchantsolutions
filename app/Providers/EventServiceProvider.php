<?php

namespace App\Providers;

use App\Events\ClaimCreated;
use App\Events\OfferInteracted;
use App\Events\RedemptionAttempted;
use App\Events\ScreenViewed;
use App\Listeners\LogClaimActivity;
use App\Listeners\LogOfferInteraction;
use App\Listeners\LogRedemptionActivity;
use App\Listeners\LogScreenView;
use App\Listeners\SendCouponEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Coupon code + QR generation happen synchronously inside ClaimService
     * (the claims.coupon_code column is NOT NULL, so the artifact must exist
     * before the row is persisted). Events below fire *after* the claim is
     * safely stored, driving only side effects: email delivery + logging.
     */
    protected $listen = [
        ClaimCreated::class => [
            SendCouponEmail::class,  // queued: sends coupon email, logs coupon_email_sent/failed
            LogClaimActivity::class, // logs coupon_claim
        ],
        RedemptionAttempted::class => [
            LogRedemptionActivity::class, // logs redemption_success / redemption_failed / validation_failure
        ],
        OfferInteracted::class => [
            LogOfferInteraction::class, // logs offer_click / offer_tap
        ],
        ScreenViewed::class => [
            LogScreenView::class, // logs qr_scan
        ],
    ];

    public function boot(): void
    {
        //
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
