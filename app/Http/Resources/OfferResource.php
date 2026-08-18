<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Offer */
class OfferResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'terms' => $this->terms,
            'image_url' => $this->imageUrl(),
            'status' => $this->status->value,
            'is_claimable' => $this->isClaimable(),
            'max_claims' => $this->max_claims,
            'claims_count' => $this->claims_count,
            'redemptions_count' => $this->redemptions_count,
            'conversion_rate' => $this->conversionRate(),
            'starts_at' => $this->starts_at?->toIso8601String(),
            'ends_at' => $this->ends_at?->toIso8601String(),
            'advertiser' => new AdvertiserResource($this->whenLoaded('advertiser')),
            'screens' => ScreenResource::collection($this->whenLoaded('screens')),
        ];
    }
}
