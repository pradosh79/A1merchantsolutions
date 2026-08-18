<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Screen;
use App\Services\OfferService;
use App\Services\ScreenService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * GET /s/{screen_id}
 * Public entry point reached when a consumer scans the QR code physically
 * printed/displayed on a digital signage screen. Lists the active offers
 * currently assigned to that screen.
 */
class ScreenController extends Controller
{
    public function __construct(
        protected ScreenService $screens,
        protected OfferService $offers,
    ) {
    }

    public function show(Request $request, string $screen_id): View
    {
        $screen = $this->screens->findByCode($screen_id);

        abort_unless($screen && $screen->status->value === 'active', 404);

        $this->screens->recordView($screen, $request->ip(), $request->userAgent());

        $offers = $this->offers->forScreen($screen)->load('advertiser');

        return view('public.screen', [
            'screen' => $screen,
            'offers' => $offers,
        ]);
    }
}
