<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdvertiserRequest;
use App\Http\Requests\Admin\UpdateAdvertiserRequest;
use App\Models\Advertiser;
use App\Services\AdvertiserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdvertiserController extends Controller
{
    public function __construct(protected AdvertiserService $advertisers)
    {
    }

    public function index(): View
    {
        $this->authorize('viewAny', Advertiser::class);

        $advertisers = $this->advertisers->paginate(15);

        return view('admin.advertisers.index', compact('advertisers'));
    }

    public function create(): View
    {
        $this->authorize('create', Advertiser::class);

        return view('admin.advertisers.create');
    }

    public function store(StoreAdvertiserRequest $request): RedirectResponse
    {
        $advertiser = $this->advertisers->create($request->validated(), $request->file('logo'));

        return redirect()->route('admin.advertisers.show', $advertiser)
            ->with('status', 'Advertiser created successfully.');
    }

    public function show(Advertiser $advertiser): View
    {
        $this->authorize('view', $advertiser);

        $advertiser->load(['offers' => fn ($q) => $q->latest()->limit(10)]);

        return view('admin.advertisers.show', compact('advertiser'));
    }

    public function edit(Advertiser $advertiser): View
    {
        $this->authorize('update', $advertiser);

        return view('admin.advertisers.edit', compact('advertiser'));
    }

    public function update(UpdateAdvertiserRequest $request, Advertiser $advertiser): RedirectResponse
    {
        $this->advertisers->update($advertiser, $request->validated(), $request->file('logo'));

        return redirect()->route('admin.advertisers.show', $advertiser)
            ->with('status', 'Advertiser updated successfully.');
    }

    public function destroy(Advertiser $advertiser): RedirectResponse
    {
        $this->authorize('delete', $advertiser);

        $this->advertisers->delete($advertiser);

        return redirect()->route('admin.advertisers.index')
            ->with('status', 'Advertiser deleted.');
    }

    public function rotateToken(Advertiser $advertiser): RedirectResponse
    {
        $this->authorize('update', $advertiser);

        $this->advertisers->rotateRedemptionToken($advertiser);

        return redirect()->route('admin.advertisers.show', $advertiser)
            ->with('status', 'Redemption link rotated. The old merchant link is now invalid.');
    }
}
