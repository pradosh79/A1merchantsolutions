<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CampaignCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateHomepageSettingsRequest;
use App\Services\HomepageContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Single-page admin screen: replace the homepage hero image and each
 * category pill's icon. This is what makes the frontend's images
 * backend-managed instead of hardcoded in Blade/CSS.
 */
class HomepageSettingsController extends Controller
{
    public function __construct(protected HomepageContentService $content)
    {
    }

    public function edit(): View
    {
        return view('admin.homepage-settings.edit', [
            'heroImageUrl' => $this->content->heroImageUrl(),
            'categories' => $this->content->categoriesWithIcons(),
        ]);
    }

    public function update(UpdateHomepageSettingsRequest $request): RedirectResponse
    {
        if ($request->hasFile('hero_image')) {
            $this->content->setHeroImage($request->file('hero_image'));
        }

        foreach (CampaignCategory::cases() as $category) {
            if ($request->boolean("remove_category_icon.{$category->value}")) {
                $this->content->removeCategoryIcon($category);

                continue;
            }

            $file = $request->file("category_icons.{$category->value}");
            if ($file) {
                $this->content->setCategoryIcon($category, $file);
            }
        }

        return redirect()->route('admin.homepage-settings.edit')
            ->with('status', 'Homepage images updated.');
    }
}
