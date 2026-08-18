<?php

namespace App\Enums;

enum ClaimStatus: string
{
    case Claimed = 'claimed';
    case Redeemed = 'redeemed';
    case Expired = 'expired';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return ucfirst($this->value);
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::Claimed => 'primary',
            self::Redeemed => 'success',
            self::Expired => 'secondary',
            self::Cancelled => 'danger',
        };
    }

    public static function options(): array
    {
        return array_map(fn (self $c) => ['value' => $c->value, 'label' => $c->label()], self::cases());
    }
}
