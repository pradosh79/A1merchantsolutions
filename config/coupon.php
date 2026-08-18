<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Coupon code generation
    |--------------------------------------------------------------------------
    */
    'code_length' => (int) env('COUPON_CODE_LENGTH', 8),
    'code_alphabet' => 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789', // no ambiguous chars (0/O, 1/I)
    'expiry_days' => (int) env('COUPON_EXPIRY_DAYS', 30),
    'code_generation_max_attempts' => 10,

    /*
    |--------------------------------------------------------------------------
    | QR code
    |--------------------------------------------------------------------------
    */
    'qr' => [
        'size' => (int) env('QR_CODE_SIZE', 300),
        'margin' => 1,
        'format' => 'svg', // svg avoids imagick/gd dependency
        'disk' => 'public',
        'directory' => 'qrcodes',
        'error_correction' => 'H',
    ],

    /*
    |--------------------------------------------------------------------------
    | Claim rules
    |--------------------------------------------------------------------------
    */
    'claim' => [
        'rate_limit_per_minute' => (int) env('CLAIM_RATE_LIMIT_PER_MINUTE', 5),
        'duplicate_window_hours' => 24, // block same email claiming same offer again within window
    ],

    /*
    |--------------------------------------------------------------------------
    | Merchant redemption token
    |--------------------------------------------------------------------------
    */
    'merchant_token_length' => (int) env('MERCHANT_TOKEN_LENGTH', 40),
];
