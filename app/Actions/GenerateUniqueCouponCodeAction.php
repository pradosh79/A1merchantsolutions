<?php

namespace App\Actions;

use App\Exceptions\CouponGenerationException;
use App\Models\Claim;
use Illuminate\Support\Str;

/**
 * Single-purpose action: produce a cryptographically random, human-friendly,
 * collision-checked coupon code (ambiguous characters like 0/O, 1/I excluded).
 */
class GenerateUniqueCouponCodeAction
{
    public function __invoke(?int $length = null): string
    {
        $length ??= (int) config('coupon.code_length', 8);
        $alphabet = config('coupon.code_alphabet', 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789');
        $maxAttempts = (int) config('coupon.code_generation_max_attempts', 10);

        for ($attempt = 0; $attempt < $maxAttempts; $attempt++) {
            $code = $this->random($alphabet, $length);

            if (! Claim::withoutGlobalScopes()->where('coupon_code', $code)->exists()) {
                return $code;
            }
        }

        throw new CouponGenerationException;
    }

    protected function random(string $alphabet, int $length): string
    {
        $max = strlen($alphabet) - 1;
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $alphabet[random_int(0, $max)];
        }

        return $code;
    }
}
