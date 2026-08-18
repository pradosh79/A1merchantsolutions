<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct(protected OfferService $offers)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Offer::class);

        $offers = $this->offers->paginate(20, $request->only(['status', 'advertiser_id', 'search']));

        return response()->json([
            'success' => true,
            'data' => OfferResource::collection($offers->items()),
            'meta' => [
                'current_page' => $offers->currentPage(),
                'last_page' => $offers->lastPage(),
                'total' => $offers->total(),
            ],
        ]);
    }
}
