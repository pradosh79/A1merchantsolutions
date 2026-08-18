<?php

namespace Database\Factories;

use App\Enums\CampaignCategory;
use App\Enums\OfferStatus;
use App\Models\Advertiser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfferFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->words(3, true).' Offer';

        return [
            'uuid' => (string) Str::uuid(),
            'advertiser_id' => Advertiser::factory(),
            'category' => fake()->randomElement(CampaignCategory::cases())->value,
            'title' => ucfirst($title),
            'slug' => Str::slug($title).'-'.Str::lower(Str::random(4)),
            'description' => fake()->paragraph(),
            'terms' => fake()->paragraph(),
            'image_path' => null,
            'status' => OfferStatus::Active,
            'max_claims' => fake()->randomElement([null, 50, 100, 500]),
            'claims_count' => 0,
            'redemptions_count' => 0,
            'starts_at' => now()->subDay(),
            'ends_at' => now()->addMonth(),
            'coupon_expiry_days' => null,
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => ['status' => OfferStatus::Draft]);
    }

    public function expired(): static
    {
        return $this->state(fn () => [
            'status' => OfferStatus::Expired,
            'starts_at' => now()->subMonths(2),
            'ends_at' => now()->subDay(),
        ]);
    }
}
