<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\View\View;

class AnalyticsController extends Controller
{
    public function __construct(protected AnalyticsService $analytics)
    {
    }

    public function __invoke(): View
    {
        $offerPerformance = $this->analytics->offerConversion();

        return view('admin.analytics.index', compact('offerPerformance'));
    }
}
