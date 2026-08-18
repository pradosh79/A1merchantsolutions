<?php

use App\Http\Controllers\Public\ClaimController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\NewsletterController;
use App\Http\Controllers\Public\OfferController;
use App\Http\Controllers\Public\OfferQrController;
use App\Http\Controllers\Public\PublicImageController;
use App\Http\Controllers\Public\ScreenController;
use App\Http\Controllers\Public\UploadedStorageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public (unauthenticated) routes
|--------------------------------------------------------------------------
| These are the ONLY consumer-facing routes. Views are simple Bootstrap
| placeholders backed entirely by Services/Resources — see class docblocks.
| Swapping in Figma HTML later means editing resources/views/public/*.blade.php
| only; no controller/service/route changes required.
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/uploaded-storage/{path}', [UploadedStorageController::class, 'show'])
    ->where('path', '.*')
    ->name('public.uploaded-storage');

Route::get('/images/{path}', [PublicImageController::class, 'show'])
    ->where('path', '.*')
    ->name('public.images');

$appUrlPath = trim(parse_url(config('app.url'), PHP_URL_PATH) ?: '', '/');

if ($appUrlPath !== '') {
    Route::prefix($appUrlPath)->group(function () {
        Route::get('/storage/{path}', [UploadedStorageController::class, 'show'])
            ->where('path', '.*');
        Route::get('/uploaded-storage/{path}', [UploadedStorageController::class, 'show'])
            ->where('path', '.*');
        Route::get('/images/{path}', [PublicImageController::class, 'show'])
            ->where('path', '.*');
    });
}

Route::get('/s/{screen_id}', [ScreenController::class, 'show'])->name('public.screen');

Route::get('/o/{offer:uuid}', [OfferController::class, 'show'])->name('public.offer');
Route::get('/o/{offer:uuid}/qr.svg', [OfferQrController::class, 'show'])->name('public.offer.qr');

Route::middleware('throttle:claims')->group(function () {
    Route::post('/claim', [ClaimController::class, 'store'])->name('public.claim');
});

Route::get('/confirmation/{claim}', [ClaimController::class, 'confirmation'])->name('public.confirmation');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])
    ->middleware('throttle:claims')
    ->name('public.newsletter.subscribe');
