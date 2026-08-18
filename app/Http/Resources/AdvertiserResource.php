<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Advertiser */
class AdvertiserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'slug' => $this->slug,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'logo_url' => $this->logoUrl(),
            'status' => $this->status->value,
            'offers_count' => $this->whenCounted('offers'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
