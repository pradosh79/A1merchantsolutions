<?php

namespace App\Http\Resources;

use App\Support\PublicStorageUrl;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Claim
 *
 * NOTE: coupon_code is only exposed when explicitly requested via
 * ClaimResource::withCouponCode(), reserved for the post-claim confirmation
 * view and authenticated admin views. Never expose it in list/index contexts.
 */
class ClaimResource extends JsonResource
{
    protected bool $exposeCouponCode = false;

    public function withCouponCode(bool $expose = true): static
    {
        $this->exposeCouponCode = $expose;

        return $this;
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status->value,
            'expires_at' => $this->expires_at?->toIso8601String(),
            'redeemed_at' => $this->redeemed_at?->toIso8601String(),
            'created_at' => $this->created_at?->toIso8601String(),
            'offer' => new OfferResource($this->whenLoaded('offer')),
            'screen' => new ScreenResource($this->whenLoaded('screen')),
            'coupon_code' => $this->when($this->exposeCouponCode, fn () => $this->getRawOriginal('coupon_code')),
            'qr_code_url' => $this->when(
                $this->exposeCouponCode && $this->qr_code_path,
                fn () => PublicStorageUrl::for($this->qr_code_path)
            ),
        ];
    }
}
