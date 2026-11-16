<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * An old slug that should 301 to the current page of a brand, category,
 * sub-category or product.
 */
class SlugRedirect extends Model
{
    public const MODELS = [
        'brand' => Brand::class,
        'category' => Category::class,
        'sub_category' => SubCategory::class,
        'product' => Product::class,
    ];

    protected $fillable = ['type', 'old_slug', 'target_type', 'target_id'];

    /**
     * The current model an old slug of the given kind points to, if any.
     */
    public static function resolve(string $type, ?string $slug): ?Model
    {
        if ($slug === null || $slug === '') {
            return null;
        }

        $redirect = static::where('type', $type)->where('old_slug', $slug)->first();
        $class = $redirect ? (self::MODELS[$redirect->target_type] ?? null) : null;

        return $class ? $class::find($redirect->target_id) : null;
    }
}
