<?php

namespace App\Enums;

/**
 * Result codes returned by the merchant scanner validation endpoint.
 */
enum RedemptionResult: string
{
    case Valid = 'VALID';
    case AlreadyRedeemed = 'ALREADY_REDEEMED';
    case NotFound = 'NOT_FOUND';
    case Expired = 'EXPIRED';
    case InvalidToken = 'INVALID_MERCHANT_TOKEN';

    public function message(): string
    {
        return match ($this) {
            self::Valid => 'Coupon is valid and has been redeemed.',
            self::AlreadyRedeemed => 'This coupon has already been redeemed.',
            self::NotFound => 'Coupon code not found.',
            self::Expired => 'This coupon has expired.',
            self::InvalidToken => 'Invalid merchant redemption link.',
        };
    }

    public function httpStatus(): int
    {
        return match ($this) {
            self::Valid => 200,
            self::AlreadyRedeemed => 409,
            self::NotFound => 404,
            self::Expired => 410,
            self::InvalidToken => 403,
        };
    }
}
