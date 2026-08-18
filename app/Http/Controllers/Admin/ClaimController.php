<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ExportClaimsToCsvAction;
use App\Http\Controllers\Controller;
use App\Interfaces\ClaimRepositoryInterface;
use App\Models\Claim;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ClaimController extends Controller
{
    public function __construct(protected ClaimRepositoryInterface $claims)
    {
    }

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Claim::class);

        $filters = $request->only(['status', 'offer_id', 'from', 'to', 'search']);
        $claims = $this->claims->paginate(20, $filters);

        return view('admin.claims.index', compact('claims', 'filters'));
    }

    public function show(Claim $claim): View
    {
        $this->authorize('view', $claim);

        $claim->load(['offer.advertiser', 'screen']);

        return view('admin.claims.show', compact('claim'));
    }

    public function export(Request $request, ExportClaimsToCsvAction $exportAction): StreamedResponse
    {
        $this->authorize('export', Claim::class);

        $filters = $request->only(['status', 'from', 'to']);
        $claims = $this->claims->forExport($filters);

        return $exportAction($claims, includeCouponCode: true);
    }
}
