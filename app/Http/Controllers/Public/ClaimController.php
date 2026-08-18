<?php

namespace App\Http\Controllers\Public;

use App\DTO\ClaimData;
use App\Exceptions\CouponException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreClaimRequest;
use App\Interfaces\ClaimRepositoryInterface;
use App\Services\ClaimService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * POST /claim, GET /confirmation/{claim}
 * The controller's only job: validate input (via Form Request), hand off
 * to ClaimService, and redirect. All coupon/QR/email logic lives in the
 * Service + Event/Listener layer.
 */
class ClaimController extends Controller
{
    public function __construct(
        protected ClaimService $claimService,
        protected ClaimRepositoryInterface $claims,
    ) {
    }

    public function store(StoreClaimRequest $request): RedirectResponse
    {
        $data = ClaimData::fromArray(array_merge($request->validated(), [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]));

        try {
            $claim = $this->claimService->createClaim($data);
        } catch (CouponException $e) {
            return back()->withInput()->withErrors(['claim' => $e->getMessage()]);
        }

        return redirect()->route('public.confirmation', $claim->uuid);
    }

    public function confirmation(string $claim): View
    {
        $claimModel = $this->claims->findByUuid($claim);

        abort_unless($claimModel, 404);

        return view('public.confirmation', ['claim' => $claimModel]);
    }
}
