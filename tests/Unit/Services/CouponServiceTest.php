<?php

namespace Tests\Unit\Services;

use App\Models\Offer;
use App\Services\CouponService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CouponServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_issues_a_coupon_with_configured_code_length_and_a_qr_file(): void
    {
        Storage::fake('public');
        config(['coupon.code_length' => 8, 'coupon.expiry_days' => 30]);

        $offer = Offer::factory()->create();

        /** @var CouponService $service */
        $service = $this->app->make(CouponService::class);
        $coupon = $service->issue($offer);

        $this->assertSame(8, strlen($coupon->code));
        $this->assertMatchesRegularExpression('/^[A-Z0-9]+$/', $coupon->code);
        Storage::disk('public')->assertExists($coupon->qrCodePath);
        $this->assertTrue($coupon->expiresAt->isFuture());
    }

    public function test_offer_level_expiry_override_is_respected(): void
    {
        Storage::fake('public');

        $offer = Offer::factory()->create(['coupon_expiry_days' => 5]);

        $service = $this->app->make(CouponService::class);
        $coupon = $service->issue($offer);

        $this->assertTrue($coupon->expiresAt->lessThanOrEqualTo(now()->addDays(5)->addMinute()));
        $this->assertTrue($coupon->expiresAt->greaterThan(now()->addDays(4)));
    }
}
