<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;

class DashboardController extends Controller
{
    public function __construct(protected AnalyticsService $analytics)
    {
    }

    public function __invoke()
    {
        $widgets = $this->analytics->dashboard();

        return view('admin.dashboard', compact('widgets'));
    }
}
