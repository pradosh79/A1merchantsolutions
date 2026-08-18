<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        $screens = Screen::all();

        Advertiser::all()->each(function (Advertiser $advertiser) use ($screens) {
            Offer::factory()
                ->count(random_int(2, 4))
                ->create(['advertiser_id' => $advertiser->id])
                ->each(function (Offer $offer) use ($screens) {
                    $offer->screens()->attach($screens->random(min(2, $screens->count()))->pluck('id'));
                });
        });
    }
}
