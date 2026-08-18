<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Http\Resources\ScreenResource;
use App\Services\OfferService;
use App\Services\ScreenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function __construct(
        protected ScreenService $screens,
        protected OfferService $offers,
    ) {
    }

    public function show(Request $request, string $code): JsonResponse
    {
        $screen = $this->screens->findByCode($code);

        if (! $screen || $screen->status->value !== 'active') {
            return response()->json(['success' => false, 'message' => 'Screen not found.'], 404);
        }

        $this->screens->recordView($screen, $request->ip(), $request->userAgent());

        return response()->json([
            'success' => true,
            'screen' => new ScreenResource($screen),
            'offers' => OfferResource::collection($this->offers->forScreen($screen)),
        ]);
    }
}
