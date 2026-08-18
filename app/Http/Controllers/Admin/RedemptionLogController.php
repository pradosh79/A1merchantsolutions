<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\View\View;

class RedemptionLogController extends Controller
{
    public function __construct(protected AnalyticsService $analytics)
    {
    }

    public function __invoke(): View
    {
        $logs = $this->analytics->redemptionLogs(25);

        return view('admin.logs.redemptions', compact('logs'));
    }
}
