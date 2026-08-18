<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\Http\JsonResponse;

/**
 * Authenticated (Sanctum) API mirror of the Blade admin dashboard, so a
 * future SPA/Figma-driven admin frontend can consume the same
 * AnalyticsService without any backend changes.
 */
class DashboardController extends Controller
{
    public function __construct(protected AnalyticsService $analytics)
    {
    }

    public function __invoke(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => $this->analytics->dashboard()]);
    }
}
