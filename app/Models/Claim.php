<?php

namespace App\Models;

use App\Enums\ClaimStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'offer_id', 'screen_id', 'name', 'email', 'phone',
        'coupon_code', 'qr_code_path', 'status', 'expires_at',
        'redeemed_at', 'redeemed_by', 'ip_address', 'user_agent',
    ];

    protected $hidden = [
        // Coupon code must never leak through default JSON/array serialization
        // on public-facing responses; ClaimResource explicitly opts back in
        // only where the recipient is authorized (admin / post-claim owner view).
        'coupon_code',
    ];

    protected function casts(): array
    {
        return [
            'status' => ClaimStatus::class,
            'expires_at' => 'datetime',
            'redeemed_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $claim) {
            $claim->uuid ??= (string) Str::uuid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function screen(): BelongsTo
    {
        return $this->belongsTo(Screen::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isRedeemed(): bool
    {
        return $this->status === ClaimStatus::Redeemed;
    }

    public function scopeStatus($query, ClaimStatus $status)
    {
        return $query->where('status', $status);
    }
}
