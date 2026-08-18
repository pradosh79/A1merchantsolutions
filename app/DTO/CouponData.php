<?php

namespace App\DTO;

/**
 * Represents the generated coupon artifacts (code + QR path) that
 * CouponService hands back to ClaimService after issuing a coupon.
 */
final class CouponData
{
    public function __construct(
        public readonly string $code,
        public readonly string $qrCodePath,
        public readonly string $qrCodeUrl,
        public readonly \DateTimeInterface $expiresAt,
    ) {
    }
}
