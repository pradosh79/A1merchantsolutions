<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidMerchantTokenException;
use App\Services\RedemptionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Resolves the {advertiser_token} route parameter into an active Advertiser
 * and binds it into the request for the merchant redemption controller,
 * or aborts with a consistent "invalid token" response.
 */
class EnsureAdvertiserTokenIsValid
{
    public function __construct(protected RedemptionService $redemption)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route('advertiser_token');

        try {
            $advertiser = $this->redemption->resolveAdvertiser((string) $token);
        } catch (InvalidMerchantTokenException $e) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 403);
            }

            abort(403, $e->getMessage());
        }

        $request->attributes->set('advertiser', $advertiser);

        return $next($request);
    }
}
