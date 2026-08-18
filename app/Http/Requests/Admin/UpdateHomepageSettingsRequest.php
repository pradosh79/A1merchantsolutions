<?php

namespace App\Http\Requests\Admin;

use App\Enums\CampaignCategory;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Every field is optional: the admin can update just the hero image, just
 * one category icon, or several at once from the same form.
 */
class UpdateHomepageSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_active ?? false;
    }

    public function rules(): array
    {
        $rules = [
            'hero_image' => ['nullable', 'image', 'max:4096'],
        ];

        foreach (CampaignCategory::cases() as $category) {
            $rules["category_icons.{$category->value}"] = ['nullable', 'image', 'max:1024'];
            $rules["remove_category_icon.{$category->value}"] = ['nullable', 'boolean'];
        }

        return $rules;
    }
}
