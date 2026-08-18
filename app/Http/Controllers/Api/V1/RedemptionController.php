<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\RedeemCouponRequest;
use App\Models\Advertiser;
use App\Services\RedemptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Headless equivalent of the merchant scanner page, for a future native
 * scanner app. Same `advertiser.token` middleware + RedemptionService as
 * the Blade version — zero duplicated business logic.
 */
class RedemptionController extends Controller
{
    public function __construct(protected RedemptionService $redemption)
    {
    }

    public function redeem(RedeemCouponRequest $request, string $advertiser_token): JsonResponse
    {
        /** @var Advertiser $advertiser */
        $advertiser = $request->attributes->get('advertiser');

        $result = $this->redemption->redeem(
            advertiser: $advertiser,
            couponCode: $request->validated('code'),
            redeemedBy: $request->validated('redeemed_by'),
            ip: $request->ip(),
            ua: $request->userAgent(),
        );

        return response()->json($result->toArray(), $result->result->httpStatus());
    }
}
