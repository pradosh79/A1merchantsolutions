<?php

use App\Jobs\ExpireStaleClaimsJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Housekeeping: sweep expired-but-unredeemed claims every hour.
Schedule::job(new ExpireStaleClaimsJob)->hourly();
