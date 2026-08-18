<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOfferRequest;
use App\Http\Requests\Admin\UpdateOfferRequest;
use App\Interfaces\AdvertiserRepositoryInterface;
use App\Interfaces\ScreenRepositoryInterface;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferController extends Controller
{
    public function __construct(
        protected OfferService $offers,
        protected AdvertiserRepositoryInterface $advertisers,
        protected ScreenRepositoryInterface $screens,
    ) {
    }

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Offer::class);

        $offers = $this->offers->paginate(15, $request->only(['status', 'advertiser_id', 'search']));

        return view('admin.offers.index', compact('offers'));
    }

    public function create(): View
    {
        $this->authorize('create', Offer::class);

        $advertisers = $this->advertisers->all();
        $screens = $this->screens->all();

        return view('admin.offers.create', compact('advertisers', 'screens'));
    }

    public function store(StoreOfferRequest $request): RedirectResponse
    {
        $offer = $this->offers->create($request->validated(), $request->file('image'));

        return redirect()->route('admin.offers.show', $offer)
            ->with('status', 'Offer created successfully.');
    }

    public function show(Offer $offer): View
    {
        $this->authorize('view', $offer);

        $offer->load(['advertiser', 'screens', 'claims' => fn ($q) => $q->latest()->limit(10)]);

        return view('admin.offers.show', compact('offer'));
    }

    public function edit(Offer $offer): View
    {
        $this->authorize('update', $offer);

        $advertisers = $this->advertisers->all();
        $screens = $this->screens->all();
        $selectedScreenIds = $offer->screens()->pluck('screens.id')->toArray();

        return view('admin.offers.edit', compact('offer', 'advertisers', 'screens', 'selectedScreenIds'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer): RedirectResponse
    {
        $this->offers->update($offer, $request->validated(), $request->file('image'));

        return redirect()->route('admin.offers.show', $offer)
            ->with('status', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer): RedirectResponse
    {
        $this->authorize('delete', $offer);

        $this->offers->delete($offer);

        return redirect()->route('admin.offers.index')->with('status', 'Offer deleted.');
    }
}
