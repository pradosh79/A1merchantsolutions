<?php

namespace Database\Factories;

use App\Enums\ClaimStatus;
use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClaimFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => (string) Str::uuid(),
            'offer_id' => Offer::factory(),
            'screen_id' => Screen::factory(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'coupon_code' => Str::upper(Str::random(8)),
            'qr_code_path' => null,
            'status' => ClaimStatus::Claimed,
            'expires_at' => now()->addDays(30),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
        ];
    }

    public function redeemed(): static
    {
        return $this->state(fn () => [
            'status' => ClaimStatus::Redeemed,
            'redeemed_at' => now(),
            'redeemed_by' => 'merchant-scanner',
        ]);
    }

    public function expired(): static
    {
        return $this->state(fn () => [
            'status' => ClaimStatus::Expired,
            'expires_at' => now()->subDay(),
        ]);
    }
}
