<?php

namespace App\Models;

use App\Models\Concerns\RecordsSlugRedirects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory, RecordsSlugRedirects;

    public const SLUG_REDIRECT_TYPE = 'sub_category';

    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }

    /**
     * Clean storefront URL: /{category-slug}/{slug}
     */
    public function url(array $query = []): string
    {
        return route('sub-category.show', [
            'category' => $this->category->slug,
            'subCategory' => $this->slug,
        ] + $query);
    }
}
