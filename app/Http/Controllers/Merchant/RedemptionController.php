<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\RedeemCouponRequest;
use App\Models\Advertiser;
use App\Services\RedemptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * GET  /r/{advertiser_token}          -> scanner UI (camera + manual input)
 * POST /r/{advertiser_token}/redeem   -> AJAX validate + burn coupon
 *
 * No admin login required here: the long, random, rotatable advertiser
 * token IS the authorization credential, resolved by the
 * `advertiser.token` route middleware into request->attributes['advertiser'].
 */
class RedemptionController extends Controller
{
    public function __construct(protected RedemptionService $redemption)
    {
    }

    public function show(Request $request, string $advertiser_token): View
    {
        /** @var Advertiser $advertiser */
        $advertiser = $request->attributes->get('advertiser');

        return view('merchant.scanner', compact('advertiser', 'advertiser_token'));
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
