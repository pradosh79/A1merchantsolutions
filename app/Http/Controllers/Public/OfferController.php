<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Interfaces\ScreenRepositoryInterface;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * GET /o/{offer}
 * Offer detail / landing page reached via tap-through from the screen page.
 * Renders the claim form. Route-model-bound by Offer::uuid.
 */
class OfferController extends Controller
{
    public function __construct(
        protected OfferService $offers,
        protected ScreenRepositoryInterface $screens,
    ) {
    }

    public function show(Request $request, Offer $offer): View
    {
        abort_unless($offer->status->value === 'active', 404);

        $screen = $request->query('screen') ? $this->screens->findByCode($request->query('screen')) : null;

        $this->offers->recordInteraction($offer, $screen, 'click', $request->ip(), $request->userAgent());

        $offer->load('advertiser');

        return view('public.offer', [
            'offer' => $offer,
            'screen' => $screen,
        ]);
    }
}
