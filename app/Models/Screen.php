<?php

namespace App\Models;

use App\Enums\ScreenStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Screen extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 'code', 'name', 'location', 'status', 'meta', 'last_ping_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => ScreenStatus::class,
            'meta' => 'array',
            'last_ping_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $screen) {
            $screen->uuid ??= (string) Str::uuid();
            $screen->code ??= Str::upper(Str::random(8));
        });
    }

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'offer_screen')->withTimestamps();
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
        return $query->where('status', ScreenStatus::Active);
    }
}
