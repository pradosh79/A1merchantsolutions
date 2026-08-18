<?php

namespace App\Enums;

/**
 * Every trackable event in the platform funnel:
 * QR scan -> arrival -> offer click/tap -> coupon claim -> coupon email -> redemption
 */
enum ActivityType: string
{
    case QrScan = 'qr_scan';
    case ScreenArrival = 'screen_arrival';
    case OfferClick = 'offer_click';
    case OfferTap = 'offer_tap';
    case CouponClaim = 'coupon_claim';
    case CouponEmailSent = 'coupon_email_sent';
    case CouponEmailFailed = 'coupon_email_failed';
    case RedemptionSuccess = 'redemption_success';
    case RedemptionFailed = 'redemption_failed';
    case ValidationFailure = 'validation_failure';

    public function label(): string
    {
        return match ($this) {
            self::QrScan => 'QR Scan',
            self::ScreenArrival => 'Screen Arrival',
            self::OfferClick => 'Offer Click',
            self::OfferTap => 'Offer Tap',
            self::CouponClaim => 'Coupon Claim',
            self::CouponEmailSent => 'Coupon Email Sent',
            self::CouponEmailFailed => 'Coupon Email Failed',
            self::RedemptionSuccess => 'Redemption Success',
            self::RedemptionFailed => 'Redemption Failed',
            self::ValidationFailure => 'Validation Failure',
        };
    }

    public static function values(): array
    {
        return array_map(fn (self $c) => $c->value, self::cases());
    }
}
