<?php

namespace App\Models;

use App\Enums\AdvertiserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Support\PublicStorageUrl;

class Advertiser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'slug', 'contact_email', 'contact_phone',
        'logo_path', 'address', 'status', 'redemption_token',
        'redemption_token_rotated_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => AdvertiserStatus::class,
            'redemption_token_rotated_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $advertiser) {
            $advertiser->uuid ??= (string) Str::uuid();
            $advertiser->slug ??= Str::slug($advertiser->name).'-'.Str::lower(Str::random(4));
            $advertiser->redemption_token ??= Str::random(config('coupon.merchant_token_length', 40));
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', AdvertiserStatus::Active);
    }

    public function logoUrl(): ?string
    {
        if (! $this->logo_path) {
            return null;
        }

        return PublicStorageUrl::for($this->logo_path);
    }
}
