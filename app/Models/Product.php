<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'sku',
        'usd_offer_price',
        'weight_grams',
        'short_description',
        'description',
        'how_to_use',
        'ingredients',
        'image',
        'status',
        'is_best_seller',
        'is_new_arrival',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'is_best_seller' => 'boolean',
            'is_new_arrival' => 'boolean',
            'weight_grams' => 'integer',
            'usd_offer_price' => 'decimal:2',
        ];
    }

    /**
     * Generate the next sequential product SKU (e.g. PROD-0001).
     */
    public static function generateSku(): string
    {
        $lastNumber = static::query()
            ->where('sku', 'like', 'PROD-%')
            ->get(['sku'])
            ->map(fn ($product) => (int) str_replace('PROD-', '', $product->sku))
            ->max();

        return 'PROD-' . str_pad(($lastNumber ?? 0) + 1, 4, '0', STR_PAD_LEFT);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_value', 'product_id', 'attribute_value_id')
                    ->using(ProductAttributeValue::class)
                    ->withPivot(['price_lkr', 'price_usd', 'sale_price_lkr', 'sale_price_usd', 'stock', 'sku', 'sap_code', 'weight_grams', 'image'])
                    ->withTimestamps();
    }

    public function totalStock(): int
    {
        return $this->attributeValues->sum(function ($val) {
            return $val->pivot->stock ?? 0;
        });
    }

    /**
     * The variant (attribute value) used as the default selection wherever
     * a customer hasn't explicitly picked one — the cheapest priced variant.
     */
    public function defaultAttributeValue(): ?AttributeValue
    {
        return $this->attributeValues->sortBy(function ($val) {
            $price = $val->pivot->sale_price_lkr ?: $val->pivot->price_lkr;
            return $price > 0 ? (float) $price : PHP_INT_MAX;
        })->first();
    }

    public function priceRangeLkr(): string
    {
        $prices = $this->attributeValues->map(function ($val) {
            return $val->pivot->sale_price_lkr ?: $val->pivot->price_lkr;
        })->filter(fn($p) => $p > 0);

        if ($prices->isEmpty()) {
            return 'N/A';
        }

        $min = $prices->min();
        $max = $prices->max();

        if ($min == $max) {
            return 'LKR ' . number_format($min, 2);
        }

        return 'LKR ' . number_format($min, 2) . ' - LKR ' . number_format($max, 2);
    }

    public function priceRangeUsd(): string
    {
        $prices = $this->attributeValues->map(function ($val) {
            return $val->pivot->sale_price_usd ?: $val->pivot->price_usd;
        })->filter(fn($p) => $p > 0);

        if ($prices->isEmpty()) {
            return 'N/A';
        }

        $min = $prices->min();
        $max = $prices->max();

        if ($min == $max) {
            return '$' . number_format($min, 2);
        }

        return '$' . number_format($min, 2) . ' - $' . number_format($max, 2);
    }
 
    public function formattedPrice(): string
    {
        $currency = session('currency', 'LKR');
        return $currency === 'USD' ? $this->priceRangeUsd() : $this->priceRangeLkr();
    }

    /**
     * Regular vs. sale pricing for the default (cheapest) variant, in the
     * visitor's detected currency — for cards that show a struck-through
     * regular price alongside the sale price and a discount badge.
     */
    public function pricingSummary(): array
    {
        $currency = session('currency', 'LKR');
        $symbol = $currency === 'USD' ? '$' : 'LKR ';
        $variant = $this->defaultAttributeValue();

        if (!$variant) {
            return [
                'has_sale' => false,
                'discount_percent' => 0,
                'regular_formatted' => null,
                'price_formatted' => $this->formattedPrice(),
            ];
        }

        $regular = (float) ($currency === 'USD' ? $variant->pivot->price_usd : $variant->pivot->price_lkr);
        $saleRaw = $currency === 'USD' ? $variant->pivot->sale_price_usd : $variant->pivot->sale_price_lkr;
        $hasSale = $saleRaw && (float) $saleRaw > 0 && (float) $saleRaw < $regular;
        $sale = $hasSale ? (float) $saleRaw : null;
        $discountPercent = $hasSale && $regular > 0 ? (int) round((1 - ($sale / $regular)) * 100) : 0;

        return [
            'has_sale' => $hasSale,
            'discount_percent' => $discountPercent,
            'regular_formatted' => $symbol . number_format($regular, 2),
            'price_formatted' => $symbol . number_format($hasSale ? $sale : $regular, 2),
        ];
    }
}
