<?php

namespace App\Http\Requests\Merchant;

use Illuminate\Foundation\Http\FormRequest;

class RedeemCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Authorization is enforced by the `advertiser.token` route middleware,
        // which resolves and validates the merchant token before this runs.
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:32'],
            'redeemed_by' => ['nullable', 'string', 'max:100'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'code' => strtoupper(trim((string) $this->input('code'))),
        ]);
    }
}
