<?php

namespace App\Services;

use App\Actions\GenerateQrCodeAction;
use App\Actions\GenerateUniqueCouponCodeAction;
use App\DTO\CouponData;
use App\Models\Offer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Owns everything related to producing a redeemable coupon: the code,
 * its expiry, and the QR artifact. Consumed by ClaimService.
 */
class CouponService
{
    public function __construct(
        protected GenerateUniqueCouponCodeAction $generateCode,
        protected GenerateQrCodeAction $generateQrCode,
    ) {
    }

    public function issue(Offer $offer): CouponData
    {
        $code = ($this->generateCode)();
        $expiresAt = $this->expiryFor($offer);

        $qrPath = ($this->generateQrCode)(
            payload: $this->qrPayload($code),
            filename: Str::lower($code).'-'.Str::random(6),
        );

        $disk = config('coupon.qr.disk', 'public');

        return new CouponData(
            code: $code,
            qrCodePath: $qrPath,
            qrCodeUrl: Storage::disk($disk)->url($qrPath),
            expiresAt: $expiresAt,
        );
    }

    public function expiryFor(Offer $offer): Carbon
    {
        $days = $offer->coupon_expiry_days ?? config('coupon.expiry_days', 30);

        return Carbon::now()->addDays($days);
    }

    /**
     * The QR encodes a stable, opaque payload (the coupon code itself).
     * Merchant scanners resolve it via the redemption API/route.
     */
    protected function qrPayload(string $code): string
    {
        return $code;
    }
}
