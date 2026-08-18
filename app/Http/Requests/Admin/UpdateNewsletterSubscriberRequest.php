<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsletterSubscriberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_active ?? false;
    }

    public function rules(): array
    {
        $id = $this->route('newsletter')?->id;

        return [
            'email' => ['required', 'email', 'max:255', Rule::unique('newsletter_subscribers', 'email')->ignore($id)],
            'source' => ['nullable', 'string', 'max:255'],
            'subscribed' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('email')) {
            $this->merge(['email' => strtolower(trim((string) $this->input('email')))]);
        }
    }
}
