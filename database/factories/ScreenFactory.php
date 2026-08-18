<?php

namespace Database\Factories;

use App\Enums\ScreenStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ScreenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => (string) Str::uuid(),
            'code' => Str::upper(Str::random(8)),
            'name' => fake()->streetName().' Digital Screen',
            'location' => fake()->address(),
            'status' => ScreenStatus::Active,
            'meta' => ['width' => 1080, 'height' => 1920],
            'last_ping_at' => now(),
        ];
    }
}
