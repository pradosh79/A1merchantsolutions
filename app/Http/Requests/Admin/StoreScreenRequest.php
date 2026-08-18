<?php

namespace App\Http\Requests\Admin;

use App\Enums\ScreenStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreScreenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', \App\Models\Screen::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(array_column(ScreenStatus::cases(), 'value'))],
            'code' => ['nullable', 'string', 'max:32', 'unique:screens,code'],
        ];
    }
}
