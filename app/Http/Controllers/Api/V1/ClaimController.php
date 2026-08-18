<?php

namespace App\Http\Controllers\Api\V1;

use App\DTO\ClaimData;
use App\Exceptions\CouponException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreClaimRequest;
use App\Http\Resources\ClaimResource;
use App\Interfaces\ClaimRepositoryInterface;
use App\Services\ClaimService;
use Illuminate\Http\JsonResponse;

class ClaimController extends Controller
{
    public function __construct(
        protected ClaimService $claimService,
        protected ClaimRepositoryInterface $claims,
    ) {
    }

    public function store(StoreClaimRequest $request): JsonResponse
    {
        $data = ClaimData::fromArray(array_merge($request->validated(), [
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]));

        try {
            $claim = $this->claimService->createClaim($data);
        } catch (CouponException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage(), 'code' => $e->errorCode()], $e->statusCode());
        }

        // Coupon code is intentionally withheld from the API response too;
        // it is delivered exclusively via email. Confirmation endpoint below
        // only ever exposes it if the caller can prove ownership (future:
        // signed URL) — for now it mirrors the public confirmation page.
        return response()->json([
            'success' => true,
            'claim' => new ClaimResource($claim->load('offer.advertiser')),
        ], 201);
    }

    public function show(string $uuid): JsonResponse
    {
        $claim = $this->claims->findByUuid($uuid);

        if (! $claim) {
            return response()->json(['success' => false, 'message' => 'Claim not found.'], 404);
        }

        return response()->json([
            'success' => true,
            'claim' => (new ClaimResource($claim))->withCouponCode(),
        ]);
    }
}
