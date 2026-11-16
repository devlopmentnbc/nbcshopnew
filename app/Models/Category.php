<?php

namespace App\Models;

use App\Models\Concerns\RecordsSlugRedirects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, RecordsSlugRedirects;

    public const SLUG_REDIRECT_TYPE = 'category';

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'h1_heading',
        'image',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    /**
     * Clean storefront URL: /{slug}
     */
    public function url(array $query = []): string
    {
        return route('category.show', ['category' => $this->slug] + $query);
    }
}
