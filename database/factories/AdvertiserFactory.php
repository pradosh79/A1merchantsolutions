<?php

namespace Database\Factories;

use App\Enums\AdvertiserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdvertiserFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->company();

        return [
            'uuid' => (string) Str::uuid(),
            'name' => $name,
            'slug' => Str::slug($name).'-'.Str::lower(Str::random(4)),
            'contact_email' => fake()->unique()->companyEmail(),
            'contact_phone' => fake()->phoneNumber(),
            'logo_path' => null,
            'address' => fake()->address(),
            'status' => AdvertiserStatus::Active,
            'redemption_token' => Str::random(40),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['status' => AdvertiserStatus::Inactive]);
    }
}
