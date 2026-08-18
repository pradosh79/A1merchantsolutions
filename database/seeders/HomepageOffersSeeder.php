<?php

namespace Database\Seeders;

use App\Enums\CampaignCategory;
use App\Enums\OfferStatus;
use App\Models\Advertiser;
use App\Models\Offer;
use App\Models\Screen;
use Illuminate\Database\Seeder;

/**
 * Seeds a realistic, demo-ready set of campaigns matching the approved
 * homepage design (one per showcased category) so the live homepage isn't
 * empty on first run. Images are placehold.co placeholders (Offer::imageUrl()
 * passes external URLs straight through) - swap for real product photos via
 * the admin Offers > Edit screen at any time.
 */
class HomepageOffersSeeder extends Seeder
{
    public function run(): void
    {
        $advertiser = Advertiser::firstOrCreate(
            ['contact_email' => 'partners@a1merchantsolutions.com'],
            [
                'name' => 'A-1 Merchant Solutions',
                'contact_phone' => config('company.phone'),
                // Full external URL (not a storage-disk relative path) - see
                // Advertiser::logoUrl(), which passes http(s) URLs straight
                // through instead of resolving them against the public disk.
                'logo_path' => asset(ltrim(config('company.logo'), '/')),
                'status' => 'active',
            ]
        );

        $screen = Screen::query()->active()->first() ?? Screen::factory()->create();

        $offers = [
            ['category' => CampaignCategory::Lifestyle, 'title' => 'Wellness Products', 'headline' => 'FLAT 20% OFF', 'desc' => 'Live a healthy & happy life with our curated wellness range.', 'color' => '2E7D32'],
            ['category' => CampaignCategory::Beauty, 'title' => 'Beauty Essentials', 'headline' => 'UPTO 60% OFF', 'desc' => 'Look beautiful everyday with top beauty brands.', 'color' => 'AD1457'],
            ['category' => CampaignCategory::Sports, 'title' => 'Sports Gear', 'headline' => 'FLAT 30% OFF', 'desc' => 'Get the best deals on top sports brands.', 'color' => 'EF6C00'],
            ['category' => CampaignCategory::FoodAndDrinks, 'title' => 'Cravings', 'headline' => 'MID-DAY OFFER', 'desc' => 'Delicious deals on your favourite food, all day long.', 'color' => 'D84315'],
            ['category' => CampaignCategory::Fashion, 'title' => 'Winter Collection', 'headline' => 'END OF SESSION OFFER', 'desc' => 'Shop the latest trends this season.', 'color' => '6A1B9A'],
            ['category' => CampaignCategory::ECommerce, 'title' => 'Online Shopping', 'headline' => 'EXTRA 30% OFF', 'desc' => 'Great offers on electronics & more.', 'color' => '1565C0'],
            ['category' => CampaignCategory::Entertainment, 'title' => 'Movie Tickets', 'headline' => 'GET 25% OFF', 'desc' => 'Enjoy the latest releases at the best prices.', 'color' => '283593'],
            ['category' => CampaignCategory::Others, 'title' => 'Accessories', 'headline' => 'SPECIAL DEALS', 'desc' => 'Explore a wide range of accessories.', 'color' => '37474F'],
            ['category' => CampaignCategory::FoodAndDrinks, 'title' => 'Burgers', 'headline' => 'BUY 1 GET 1 FREE', 'desc' => 'Delicious deals on your favourite burgers.', 'color' => 'C62828'],
        ];

        foreach ($offers as $data) {
            $title = "{$data['headline']} on {$data['title']}";

            $offer = Offer::updateOrCreate(
                ['advertiser_id' => $advertiser->id, 'slug' => \Illuminate\Support\Str::slug($title)],
                [
                    'category' => $data['category'],
                    'title' => $title,
                    'description' => $data['desc'],
                    'terms' => 'One coupon per customer. Cannot be combined with other offers. Valid at participating locations only.',
                    'image_path' => "https://placehold.co/400x220/{$data['color']}/ffffff?text=".urlencode($data['title']),
                    'status' => OfferStatus::Active,
                    'max_claims' => 200,
                    'starts_at' => now()->subDays(3),
                    'ends_at' => now()->addDays(60),
                ]
            );

            $offer->screens()->syncWithoutDetaching([$screen->id]);
        }
    }
}
