<?php

namespace App\Services;

use App\Enums\CampaignCategory;
use App\Models\CategoryIcon;
use App\Models\SiteSetting;
use App\Support\PublicStorageUrl;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Backs the "Homepage Settings" admin screen: lets an admin replace the
 * hero banner image and each category pill's icon without a code deploy.
 *
 * Deliberately model-only (no Repository/Interface layer) - both
 * SiteSetting and CategoryIcon are simple key/value lookups with no
 * business rules or complex queries, so a repository would be pure
 * boilerplate. Promote to the standard Repository+Service pattern if that
 * ever changes (see NewsletterSubscriber for the same precedent).
 */
class HomepageContentService
{
    protected const HERO_IMAGE_KEY = 'hero_image';

    protected const DEFAULT_HERO_IMAGE = 'images/hero-default.png';

    protected const UPLOAD_DISK = 'public';

    public function heroImageUrl(): string
    {
        $path = SiteSetting::where('key', self::HERO_IMAGE_KEY)->value('value');

        return $path && Storage::disk(self::UPLOAD_DISK)->exists($path)
            ? PublicStorageUrl::for($path)
            : asset(self::DEFAULT_HERO_IMAGE);
    }

    public function setHeroImage(UploadedFile $file): void
    {
        $old = SiteSetting::where('key', self::HERO_IMAGE_KEY)->value('value');

        $path = $file->store('homepage', self::UPLOAD_DISK);

        SiteSetting::updateOrCreate(['key' => self::HERO_IMAGE_KEY], ['value' => $path]);

        if ($old) {
            Storage::disk(self::UPLOAD_DISK)->delete($old);
        }
    }

    /**
     * Every category with its current icon: an uploaded image if one has
     * been set, otherwise the enum's built-in Bootstrap Icon class as a
     * fallback so the homepage never renders a broken/missing icon.
     *
     * @return array<int, array{value: string, label: string, icon: string, icon_url: ?string}>
     */
    public function categoriesWithIcons(): array
    {
        $icons = CategoryIcon::whereNotNull('icon_path')->pluck('icon_path', 'category');

        return array_map(function (array $option) use ($icons) {
            $path = $icons->get($option['value']);

            // Only emit a URL when the file is actually present on disk, so a
            // missing/deleted upload (or a not-yet-run `storage:link`) falls
            // back to the enum's Bootstrap Icon instead of a broken <img>.
            $hasFile = $path && Storage::disk(self::UPLOAD_DISK)->exists($path);

            return [
                ...$option,
                'icon_url' => $hasFile ? PublicStorageUrl::for($path) : null,
            ];
        }, CampaignCategory::options());
    }

    public function categoryIconUrl(CampaignCategory $category): ?string
    {
        $path = CategoryIcon::where('category', $category->value)->value('icon_path');

        return $path && Storage::disk(self::UPLOAD_DISK)->exists($path)
            ? PublicStorageUrl::for($path)
            : null;
    }

    public function setCategoryIcon(CampaignCategory $category, UploadedFile $file): void
    {
        $old = CategoryIcon::where('category', $category->value)->value('icon_path');

        $path = $file->store('categories', self::UPLOAD_DISK);

        CategoryIcon::updateOrCreate(['category' => $category->value], ['icon_path' => $path]);

        if ($old) {
            Storage::disk(self::UPLOAD_DISK)->delete($old);
        }
    }

    public function removeCategoryIcon(CampaignCategory $category): void
    {
        $old = CategoryIcon::where('category', $category->value)->value('icon_path');

        if ($old) {
            Storage::disk(self::UPLOAD_DISK)->delete($old);
        }

        CategoryIcon::where('category', $category->value)->delete();
    }
}
