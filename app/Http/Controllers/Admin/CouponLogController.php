<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\View\View;

class CouponLogController extends Controller
{
    public function __construct(protected AnalyticsService $analytics)
    {
    }

    public function __invoke(): View
    {
        $logs = $this->analytics->couponLogs(25);

        return view('admin.logs.coupons', compact('logs'));
    }
}
