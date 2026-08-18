<?php

namespace App\Http\Requests\Admin;

use App\Enums\CampaignCategory;
use App\Enums\OfferStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', \App\Models\Offer::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'advertiser_id' => ['required', 'exists:advertisers,id'],
            'category' => ['nullable', Rule::in(array_column(CampaignCategory::cases(), 'value'))],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'terms' => ['nullable', 'string'],
            'status' => ['required', Rule::in(array_column(OfferStatus::cases(), 'value'))],
            'max_claims' => ['nullable', 'integer', 'min:1'],
            'coupon_expiry_days' => ['nullable', 'integer', 'min:1', 'max:365'],
            'starts_at' => ['nullable', 'date'],
            'ends_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
            'image' => ['nullable', 'image', 'max:2048'],
            'screen_ids' => ['nullable', 'array'],
            'screen_ids.*' => ['exists:screens,id'],
        ];
    }
}
