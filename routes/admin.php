<?php

use App\Http\Controllers\Admin\AdvertiserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\ClaimController;
use App\Http\Controllers\Admin\CouponLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomepageSettingsController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\RedemptionLogController;
use App\Http\Controllers\Admin\ScreenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin panel routes (session-authenticated, Bootstrap placeholder views)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/', DashboardController::class)->name('dashboard');

        Route::resource('advertisers', AdvertiserController::class);
        Route::post('advertisers/{advertiser}/rotate-token', [AdvertiserController::class, 'rotateToken'])
            ->name('advertisers.rotate-token');

        Route::resource('screens', ScreenController::class);

        Route::resource('offers', OfferController::class);

        Route::get('claims', [ClaimController::class, 'index'])->name('claims.index');
        Route::get('claims/export', [ClaimController::class, 'export'])->name('claims.export');
        Route::get('claims/{claim}', [ClaimController::class, 'show'])->name('claims.show');

        Route::get('analytics', AnalyticsController::class)->name('analytics.index');
        Route::get('logs/coupons', CouponLogController::class)->name('logs.coupons');
        Route::get('logs/redemptions', RedemptionLogController::class)->name('logs.redemptions');

        Route::get('homepage-settings', [HomepageSettingsController::class, 'edit'])->name('homepage-settings.edit');
        Route::post('homepage-settings', [HomepageSettingsController::class, 'update'])->name('homepage-settings.update');

        Route::get('newsletter/export', [NewsletterSubscriberController::class, 'export'])->name('newsletter.export');
        Route::patch('newsletter/{newsletter}/toggle', [NewsletterSubscriberController::class, 'toggle'])->name('newsletter.toggle');
        Route::resource('newsletter', NewsletterSubscriberController::class)->except(['show']);
    });
});
