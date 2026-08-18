<?php

/*
|--------------------------------------------------------------------------
| Public-facing company/brand info
|--------------------------------------------------------------------------
| Centralized here (instead of hardcoded in Blade) so the homepage, footer,
| admin navbar, login page and coupon email all pull the same values, and
| so they can be overridden per-environment via .env without touching views.
*/

return [
    'name' => env('COMPANY_NAME', 'A-1 Merchant Solutions'),
    'tagline' => env('COMPANY_TAGLINE', 'Zero Fee Processing'),
    'phone' => env('COMPANY_PHONE', '1800-000-000'),
    // Matches the address hardcoded in the (untouched) site header -
    // kept in sync here so the footer never contradicts the header.
    'email' => env('COMPANY_EMAIL', 'a1merchantsolutions@gmail.com'),
    'logo' => env('COMPANY_LOGO_PATH', '/images/logo.png'),

    'social' => [
        'facebook' => env('COMPANY_FACEBOOK_URL'),
        'instagram' => env('COMPANY_INSTAGRAM_URL'),
        'pinterest' => env('COMPANY_PINTEREST_URL'),
        'linkedin' => env('COMPANY_LINKEDIN_URL'),
    ],
];
