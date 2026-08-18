<?php

use App\Http\Controllers\Api\V1\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Api\V1\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\Api\V1\ClaimController;
use App\Http\Controllers\Api\V1\OfferController;
use App\Http\Controllers\Api\V1\RedemptionController;
use App\Http\Controllers\Api\V1\ScreenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API v1 - headless mirror of the public + merchant + admin flows.
|--------------------------------------------------------------------------
| Every endpoint here calls the exact same Service classes as the Blade
| controllers. This is what lets the Figma frontend (or a mobile scanner
| app) replace Blade entirely later without touching business logic.
*/

Route::prefix('v1')->group(function () {

    // Public
    Route::get('/screens/{code}', [ScreenController::class, 'show']);
    Route::get('/offers/{offer:uuid}', [OfferController::class, 'show']);
    Route::post('/claims', [ClaimController::class, 'store'])->middleware('throttle:claims');
    Route::get('/claims/{uuid}', [ClaimController::class, 'show']);

    // Merchant (token-protected, no admin auth)
    Route::post('/r/{advertiser_token}/redeem', [RedemptionController::class, 'redeem'])
        ->middleware(['advertiser.token', 'throttle:redemptions']);

    // Admin (Sanctum-authenticated)
    Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
        Route::get('/dashboard', AdminDashboardController::class);
        Route::get('/offers', [AdminOfferController::class, 'index']);
    });
});
