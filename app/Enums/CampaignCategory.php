<?php

namespace App\Enums;

/**
 * Public-facing offer categories used to browse/filter the homepage
 * campaign grid (see HomeController + resources/views/public/home.blade.php).
 * Separate from any internal advertiser taxonomy.
 */
enum CampaignCategory: string
{
    case Lifestyle = 'lifestyle';
    case Sports = 'sports';
    case FoodAndDrinks = 'food_and_drinks';
    case ECommerce = 'e_commerce';
    case Fashion = 'fashion';
    case Beauty = 'beauty';
    case Entertainment = 'entertainment';
    case Others = 'others';

    public function label(): string
    {
        return match ($this) {
            self::Lifestyle => 'Lifestyle',
            self::Sports => 'Sports',
            self::FoodAndDrinks => 'Food & Drinks',
            self::ECommerce => 'E-Commerce',
            self::Fashion => 'Fashion',
            self::Beauty => 'Beauty',
            self::Entertainment => 'Entertainment',
            self::Others => 'Others',
        };
    }

    /** Bootstrap Icon class shown next to the pill on the homepage. */
    public function icon(): string
    {
        return match ($this) {
            self::Lifestyle => 'bi-heart',
            self::Sports => 'bi-trophy',
            self::FoodAndDrinks => 'bi-cup-straw',
            self::ECommerce => 'bi-cart',
            self::Fashion => 'bi-bag',
            self::Beauty => 'bi-stars',
            self::Entertainment => 'bi-film',
            self::Others => 'bi-grid',
        };
    }

    public static function options(): array
    {
        return array_map(fn (self $c) => ['value' => $c->value, 'label' => $c->label(), 'icon' => $c->icon()], self::cases());
    }
}
