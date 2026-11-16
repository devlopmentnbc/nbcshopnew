<?php

namespace App\Models;

use App\Models\Concerns\RecordsSlugRedirects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory, RecordsSlugRedirects;

    public const SLUG_REDIRECT_TYPE = 'brand';

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'h1_heading',
        'image',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    /**
     * Clean storefront URL: /brands/{slug}
     */
    public function url(array $query = []): string
    {
        return route('brand.show', ['brand' => $this->slug] + $query);
    }
}
