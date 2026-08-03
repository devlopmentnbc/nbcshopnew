<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductAttributeValue extends Pivot
{
    use HasFactory;

    protected $table = 'product_attribute_value';

    protected $fillable = [
        'product_id',
        'attribute_value_id',
        'price_lkr',
        'price_usd',
        'sale_price_lkr',
        'sale_price_usd',
        'stock',
        'sku',
    ];

    protected function casts(): array
    {
        return [
            'price_lkr' => 'decimal:2',
            'price_usd' => 'decimal:2',
            'sale_price_lkr' => 'decimal:2',
            'sale_price_usd' => 'decimal:2',
            'stock' => 'integer',
        ];
    }
}
