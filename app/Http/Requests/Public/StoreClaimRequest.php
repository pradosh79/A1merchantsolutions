<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validates the public /claim submission. No business rules (offer active,
 * limits, duplicates) live here — those belong to ClaimService. This class
 * only validates shape/format of user input.
 */
class StoreClaimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // public, unauthenticated endpoint
    }

    public function rules(): array
    {
        return [
            'offer_id' => ['required', 'integer', 'exists:offers,id'],
            'screen_id' => ['nullable', 'integer', 'exists:screens,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
        ];
    }

    public function messages(): array
    {
        return [
            'offer_id.exists' => 'This offer could not be found.',
            'email.email' => 'Please enter a valid email address to receive your coupon.',
        ];
    }
}
