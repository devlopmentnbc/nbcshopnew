<?php

namespace App\Support;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;

/**
 * Promotional popup (image + message + button) shown when a visitor lands on the home page.
 * Stored as JSON in the settings table (key home_popup) and edited in
 * Admin > Settings > Home Popup. The image lives in public/uploads/home_popup.
 */
class HomePopup
{
    public const SETTING_KEY = 'home_popup';

    public const UPLOAD_DIR = 'uploads/home_popup';

    /** Where the button goes. */
    public const LINK_TYPES = [
        'shop' => 'All products (Shop page)',
        'product' => 'A specific product',
        'category' => 'A product range (category)',
        'sub_category' => 'A sub category',
        'brand' => 'A brand',
        'url' => 'Custom link (URL)',
    ];

    /** How often the same visitor sees it. */
    public const FREQUENCIES = [
        'session' => 'Once per visit (until the browser is closed)',
        'day' => 'Once per day',
        'week' => 'Once per week',
        'always' => 'Every time the home page opens',
    ];

    public const DEFAULTS = [
        'enabled' => false,
        'image' => null,
        'title' => '',
        'message' => '',
        'button_text' => 'Shop Now',
        'link_type' => 'shop',
        'product_id' => null,
        'category_id' => null,
        'sub_category_id' => null,
        'brand_id' => null,
        'custom_url' => '',
        'frequency' => 'session',
        'delay' => 2,
        // Changes on every save, so visitors who closed the old popup see the new one.
        'version' => 0,
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

    public static function imageUrl(array $popup): ?string
    {
        $path = $popup['image'];

        return $path && File::exists(public_path($path)) ? asset($path) : null;
    }

    /** The popup is shown only when it is turned on and has something to show. */
    public static function shouldShow(array $popup): bool
    {
        return $popup['enabled']
            && (self::imageUrl($popup) || trim($popup['title']) !== '' || trim($popup['message']) !== '');
    }

    /**
     * Where the button goes. Falls back to the shop page when the chosen
     * product / category / brand no longer exists or is inactive.
     */
    public static function linkUrl(array $popup): string
    {
        $url = match ($popup['link_type']) {
            'product' => Product::where('status', true)->find($popup['product_id'])?->url(),
            'category' => Category::where('status', true)->find($popup['category_id'])?->url(),
            'sub_category' => SubCategory::with('category')->where('status', true)->find($popup['sub_category_id'])?->url(),
            'brand' => Brand::where('status', true)->find($popup['brand_id'])?->url(),
            'url' => trim((string) $popup['custom_url']) ?: null,
            default => null,
        };

        return $url ?: route('shop');
    }
}
