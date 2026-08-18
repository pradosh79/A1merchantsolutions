<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Screen */
class ScreenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'code' => $this->code,
            'name' => $this->name,
            'location' => $this->location,
            'status' => $this->status->value,
            'last_ping_at' => $this->last_ping_at?->toIso8601String(),
            'claims_count' => $this->whenCounted('claims'),
        ];
    }
}
