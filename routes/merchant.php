<?php

use App\Http\Controllers\Merchant\RedemptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Merchant redemption routes
|--------------------------------------------------------------------------
| /r/{advertiser_token} - no admin login. The token itself (long, random,
| rotatable from the admin panel) is the credential. Resolved + validated
| by the `advertiser.token` middleware before the controller ever runs.
*/

Route::prefix('r/{advertiser_token}')
    ->middleware(['advertiser.token', 'throttle:redemptions'])
    ->group(function () {
        Route::get('/', [RedemptionController::class, 'show'])->name('merchant.scanner');
        Route::post('/redeem', [RedemptionController::class, 'redeem'])->name('merchant.redeem');
    });
