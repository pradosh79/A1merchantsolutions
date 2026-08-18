<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Services\HomepageContentService;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * GET /
 * The public marketing homepage (built from the approved design). Every
 * campaign card is a real, active Offer pulled through OfferService, and
 * the hero image / category icons come from HomepageContentService - both
 * fully backend-managed via the admin "Homepage Settings" screen, nothing
 * hardcoded in Blade.
 */
class HomeController extends Controller
{
    public function __construct(
        protected OfferService $offers,
        protected HomepageContentService $content,
    ) {
    }

    public function __invoke(Request $request): View
    {
        $filters = $request->only(['category', 'search']);

        $offers = $this->offers->publicPaginate(9, $filters);

        $data = [
            'offers' => $offers,
            'activeCategory' => $filters['category'] ?? null,
            'search' => $filters['search'] ?? null,
        ];

        // Live search / category filter / "Load More" are fetched over XHR and
        // swap only the results grid in place — no full-page reload.
        if ($request->ajax()) {
            return view('public._campaigns', $data);
        }

        return view('public.home', array_merge($data, [
            'categories' => $this->content->categoriesWithIcons(),
            'heroImageUrl' => $this->content->heroImageUrl(),
        ]));
    }
}
