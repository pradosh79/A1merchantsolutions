<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        \Illuminate\Database\Eloquent\Model::shouldBeStrict(! $this->app->environment('production'));

        // Public claim form: throttle by IP to slow down coupon-farming bots.
        RateLimiter::for('claims', function (Request $request) {
            $perMinute = (int) config('coupon.claim.rate_limit_per_minute', 5);

            return Limit::perMinute($perMinute)->by($request->ip());
        });

        // Merchant redemption scanner: generous but bounded, keyed by advertiser token.
        RateLimiter::for('redemptions', function (Request $request) {
            return Limit::perMinute(60)->by($request->route('advertiser_token') ?? $request->ip());
        });
    }
}
