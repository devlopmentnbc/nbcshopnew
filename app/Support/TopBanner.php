<?php

namespace App\Support;

use App\Models\Product;
use App\Models\Setting;

/**
 * The small scrolling announcement banner at the very top of every storefront page.
 * Stored as JSON in the settings table (key top_banner) and edited in
 * Admin > Settings > Top Banner.
 */
class TopBanner
{
    public const SETTING_KEY = 'top_banner';

    /** "Shop Now" opens the full shop, or one chosen product. */
    public const LINK_TYPES = [
        'all' => 'All products (Shop page)',
        'product' => 'A specific product',
    ];

    public const DEFAULTS = [
        'enabled' => true,
        'text' => 'Top products. Better prices - under Rs. 100.',
        'button_text' => 'Shop Now',
        'link_type' => 'all',
        'product_id' => null,
        'color_start' => '#4f9b04',
        'color_end' => '#214c1b',
        'text_color' => '#ffffff',
        'repeat' => 5,
    ];

    public static function get(): array
    {
        $saved = once(fn () => json_decode((string) Setting::get(self::SETTING_KEY, ''), true));

        return array_merge(self::DEFAULTS, is_array($saved) ? $saved : []);
    }

    public static function save(array $content): void
    {
        Setting::set(self::SETTING_KEY, json_encode(array_merge(self::DEFAULTS, $content)));
    }

    /**
     * Where "Shop Now" goes. Falls back to the shop page when the chosen
     * product no longer exists or is inactive.
     */
    public static function linkUrl(array $banner): string
    {
        if ($banner['link_type'] === 'product' && $banner['product_id']) {
            // Cached per request: the banner renders in both the main and the sticky header.
            $url = self::$productUrls[$banner['product_id']]
                ??= Product::where('status', true)->find($banner['product_id'])?->url() ?? '';

            if ($url !== '') {
                return $url;
            }
        }

        return route('shop');
    }

    /** @var array<int, string> product id => URL ('' when missing or inactive) */
    private static array $productUrls = [];
}
