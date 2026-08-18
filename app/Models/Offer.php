<?php

namespace App\Models;

use App\Enums\CampaignCategory;
use App\Enums\OfferStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Support\PublicStorageUrl;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 'advertiser_id', 'category', 'title', 'slug', 'description', 'terms',
        'image_path', 'status', 'max_claims', 'claims_count', 'redemptions_count',
        'starts_at', 'ends_at', 'coupon_expiry_days',
    ];

    protected function casts(): array
    {
        return [
            'status' => OfferStatus::class,
            'category' => CampaignCategory::class,
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'max_claims' => 'integer',
            'claims_count' => 'integer',
            'redemptions_count' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $offer) {
            $offer->uuid ??= (string) Str::uuid();
            $offer->slug ??= Str::slug($offer->title);
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class);
    }

    public function screens(): BelongsToMany
    {
        return $this->belongsToMany(Screen::class, 'offer_screen')->withTimestamps();
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function scopeActive($query)
    {
        $now = Carbon::now();

        return $query->where('status', OfferStatus::Active)
            ->where(fn ($q) => $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now))
            ->where(fn ($q) => $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now));
    }

    public function isClaimable(): bool
    {
        if ($this->status !== OfferStatus::Active) {
            return false;
        }

        if ($this->starts_at && $this->starts_at->isFuture()) {
            return false;
        }

        if ($this->ends_at && $this->ends_at->isPast()) {
            return false;
        }

        if ($this->max_claims !== null && $this->claims_count >= $this->max_claims) {
            return false;
        }

        return true;
    }

    public function imageUrl(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        return PublicStorageUrl::for($this->image_path);
    }

    public function categoryLabel(): ?string
    {
        return $this->category?->label();
    }

    public function conversionRate(): float
    {
        if ($this->claims_count === 0) {
            return 0.0;
        }

        return round(($this->redemptions_count / $this->claims_count) * 100, 2);
    }
}
