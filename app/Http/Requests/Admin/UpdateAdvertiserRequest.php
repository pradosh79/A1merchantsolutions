<?php

namespace App\Http\Requests\Admin;

use App\Enums\AdvertiserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdvertiserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('update', $this->route('advertiser')) ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'contact_email' => ['sometimes', 'required', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:1000'],
            'status' => ['sometimes', 'required', Rule::in(array_column(AdvertiserStatus::cases(), 'value'))],
            'logo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
