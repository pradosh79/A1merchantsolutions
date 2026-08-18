<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Interfaces\ScreenRepositoryInterface;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct(
        protected OfferService $offers,
        protected ScreenRepositoryInterface $screens,
    ) {
    }

    public function show(Request $request, Offer $offer): JsonResponse
    {
        if ($offer->status->value !== 'active') {
            return response()->json(['success' => false, 'message' => 'Offer not found.'], 404);
        }

        $screen = $request->query('screen') ? $this->screens->findByCode($request->query('screen')) : null;

        $this->offers->recordInteraction($offer, $screen, $request->query('interaction', 'click'), $request->ip(), $request->userAgent());

        return response()->json([
            'success' => true,
            'offer' => new OfferResource($offer->load('advertiser')),
        ]);
    }
}
