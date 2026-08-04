<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;

    public const TARGET_TYPES = [
        'all_products' => 'All Products',
        'product' => 'Product',
        'brand' => 'Brand',
        'category' => 'Category',
        'sub_category' => 'Subcategory',
    ];

    protected $fillable = [
        'name',
        'promotion_label',
        'slug',
        'description',
        'button_text',
        'image',
        'target_type',
        'target_id',
        'starts_at',
        'ends_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'status' => 'boolean',
        ];
    }

    public function productTarget(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'target_id');
    }

    public function brandTarget(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'target_id');
    }

    public function categoryTarget(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'target_id');
    }

    public function subCategoryTarget(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'target_id');
    }

    public function scopeCurrentlyActive(Builder $query): Builder
    {
        return $query
            ->where('status', true)
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>=', now());
    }

    public function getTargetLabelAttribute(): string
    {
        return self::TARGET_TYPES[$this->target_type] ?? ucfirst(str_replace('_', ' ', $this->target_type));
    }

    public function getTargetNameAttribute(): string
    {
        return match ($this->target_type) {
            'product' => $this->productTarget?->name ?? 'Deleted product',
            'brand' => $this->brandTarget?->name ?? 'Deleted brand',
            'category' => $this->categoryTarget?->name ?? 'Deleted category',
            'sub_category' => $this->subCategoryTarget?->name ?? 'Deleted subcategory',
            default => 'Entire catalogue',
        };
    }

    public function getScheduleStatusAttribute(): string
    {
        if (! $this->status) {
            return 'inactive';
        }

        if ($this->starts_at->isFuture()) {
            return 'scheduled';
        }

        if ($this->ends_at->isPast()) {
            return 'expired';
        }

        return 'live';
    }
}
