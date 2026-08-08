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
        ];
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
                    ->withPivot(['price_lkr', 'price_usd', 'sale_price_lkr', 'sale_price_usd', 'stock', 'sku'])
                    ->withTimestamps();
    }

    public function totalStock(): int
    {
        return $this->attributeValues->sum(function ($val) {
            return $val->pivot->stock ?? 0;
        });
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
}
