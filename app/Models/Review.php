<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'reviewer_name',
        'rating',
        'title',
        'comment',
    ];

    protected function casts(): array
    {
        return ['rating' => 'integer'];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Name shown publicly: the manual reviewer name, else the account name.
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->reviewer_name ?: ($this->user?->name ?? 'NBC customer');
    }

    public function isManual(): bool
    {
        return $this->user_id === null;
    }
}
