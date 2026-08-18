<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * GET /o/{offer}/qr.svg
 *
 * Renders a QR pointing at the offer's own public page, generated fresh on
 * every request (no storage writes). Deliberately separate from
 * GenerateQrCodeAction (used only for per-claim coupon QR codes): this one
 * encodes a public, non-secret URL, so it is safe to render directly on
 * the homepage without going anywhere near coupon/redemption logic.
 */
class OfferQrController extends Controller
{
    public function show(Offer $offer): Response
    {
        $svg = QrCode::format('svg')
            ->size(config('coupon.qr.size', 300))
            ->margin(1)
            ->errorCorrection('M')
            ->generate(route('public.offer', $offer));

        return response($svg, 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}
