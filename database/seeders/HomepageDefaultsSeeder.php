<?php

namespace Database\Seeders;

use App\Enums\CampaignCategory;
use App\Models\CategoryIcon;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

/**
 * Seeds the hero image and per-category icons supplied with the approved
 * design so the homepage looks finished immediately after a fresh
 * migrate+seed, without requiring a manual upload through
 * Admin > Homepage Settings first.
 *
 * Source files ship as bundled defaults under public/images/ (hero-default.png,
 * images/categories/*.png). This seeder copies them onto the "public" storage
 * disk and writes the same SiteSetting / CategoryIcon rows a real admin
 * upload via HomepageContentService would produce - so it's exercising the
 * exact same read path, not a separate fallback mechanism.
 */
class HomepageDefaultsSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedHeroImage();
        $this->seedCategoryIcons();
    }

    protected function seedHeroImage(): void
    {
        if (SiteSetting::where('key', 'hero_image')->exists()) {
            return;
        }

        $source = public_path('images/hero-default.png');

        if (! is_file($source)) {
            return;
        }

        $path = 'homepage/hero-default.png';
        Storage::disk('public')->put($path, file_get_contents($source));

        SiteSetting::updateOrCreate(['key' => 'hero_image'], ['value' => $path]);
    }

    protected function seedCategoryIcons(): void
    {
        foreach (CampaignCategory::cases() as $category) {
            if (CategoryIcon::where('category', $category->value)->exists()) {
                continue;
            }

            $source = public_path("images/categories/{$category->value}.png");

            if (! is_file($source)) {
                continue; // e.g. "Others" ships with no bundled icon - falls back to a Bootstrap Icon
            }

            $path = "categories/{$category->value}.png";
            Storage::disk('public')->put($path, file_get_contents($source));

            CategoryIcon::updateOrCreate(['category' => $category->value], ['icon_path' => $path]);
        }
    }
}
