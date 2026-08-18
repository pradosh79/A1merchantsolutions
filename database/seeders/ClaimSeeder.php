<?php

namespace Database\Seeders;

use App\Models\Claim;
use App\Models\Offer;
use Illuminate\Database\Seeder;

class ClaimSeeder extends Seeder
{
    public function run(): void
    {
        Offer::all()->each(function (Offer $offer) {
            $claims = Claim::factory()
                ->count(random_int(3, 10))
                ->create([
                    'offer_id' => $offer->id,
                    'screen_id' => $offer->screens()->inRandomOrder()->value('screens.id'),
                ]);

            $offer->increment('claims_count', $claims->count());

            $redeemed = $claims->random(min(2, $claims->count()));
            foreach ($redeemed as $claim) {
                $claim->update([
                    'status' => \App\Enums\ClaimStatus::Redeemed,
                    'redeemed_at' => now(),
                    'redeemed_by' => 'seed-data',
                ]);
                $offer->increment('redemptions_count');
            }
        });
    }
}
