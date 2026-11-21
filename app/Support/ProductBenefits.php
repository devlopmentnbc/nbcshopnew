<?php

namespace App\Support;

use App\Models\Setting;

/**
 * The two small benefit badges under the price on the product details page
 * (e.g. "Free islandwide shipping", "Authentic NBC product").
 * Stored as JSON in the settings table (key product_benefits) and edited in
 * Admin > Settings > Product Benefits. Inactive or empty items are not shown.
 */
class ProductBenefits
{
    public const SETTING_KEY = 'product_benefits';

    public const COUNT = 2;

    /** Font Awesome icons the admin can choose from (class => label). */
    public const ICONS = [
        'fa-truck' => 'Truck (delivery)',
        'fa-shield-check' => 'Shield (authentic / warranty)',
        'fa-badge-check' => 'Badge check',
        'fa-rotate-left' => 'Return arrow',
        'fa-credit-card' => 'Card (payment)',
        'fa-money-bill-wave' => 'Cash',
        'fa-gift' => 'Gift',
        'fa-headset' => 'Headset (support)',
        'fa-leaf' => 'Leaf',
        'fa-star' => 'Star',
        'fa-clock' => 'Clock',
        'fa-box' => 'Box',
    ];

    public const DEFAULTS = [
        ['enabled' => true, 'icon' => 'fa-truck', 'text' => 'Free islandwide shipping'],
        ['enabled' => true, 'icon' => 'fa-shield-check', 'text' => 'Authentic NBC product'],
    ];

    /** All items (for the admin form). */
    public static function all(): array
    {
        $saved = once(fn () => json_decode((string) Setting::get(self::SETTING_KEY, ''), true));

        $items = [];
        for ($i = 0; $i < self::COUNT; $i++) {
            $items[] = array_merge(self::DEFAULTS[$i], is_array($saved[$i] ?? null) ? $saved[$i] : []);
        }

        return $items;
    }

    /** Only the items that should appear on the store. */
    public static function active(): array
    {
        return array_values(array_filter(
            self::all(),
            fn (array $item) => $item['enabled'] && trim((string) $item['text']) !== ''
        ));
    }

    public static function save(array $items): void
    {
        Setting::set(self::SETTING_KEY, json_encode(array_values($items)));
    }
}
