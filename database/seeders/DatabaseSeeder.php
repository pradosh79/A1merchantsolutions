<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            AdvertiserSeeder::class,
            ScreenSeeder::class,
            HomepageOffersSeeder::class, // demo campaigns matching the approved homepage design
            HomepageDefaultsSeeder::class, // hero image + category icons from the approved design
            OfferSeeder::class,
            ClaimSeeder::class,
        ]);
    }
}
