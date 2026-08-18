<?php

namespace App\Helpers;

/**
 * Small formatting helpers used where we deliberately avoid exposing full
 * sensitive values in logs/UI (coupon codes, emails).
 */
class MaskHelper
{
    public static function couponCode(string $code): string
    {
        if (strlen($code) <= 2) {
            return str_repeat('*', strlen($code));
        }

        return substr($code, 0, 2).str_repeat('*', max(strlen($code) - 2, 4));
    }

    public static function email(string $email): string
    {
        if (! str_contains($email, '@')) {
            return str_repeat('*', strlen($email));
        }

        [$local, $domain] = explode('@', $email, 2);
        $visible = substr($local, 0, 1);

        return $visible.str_repeat('*', max(strlen($local) - 1, 3)).'@'.$domain;
    }
}
