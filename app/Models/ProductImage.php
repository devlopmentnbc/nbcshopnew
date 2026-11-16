<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        'sort_order',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Alt text for this gallery image: the admin's text, else an automatic one.
     * $number is the image's place on the product page (the main image is 1).
     */
    public function alt(int $number = 2, ?string $productAlt = null): string
    {
        if (filled($this->alt_text)) {
            return $this->alt_text;
        }

        // Pass $productAlt from a loop to avoid loading the product for every image.
        $base = $productAlt ?? $this->product?->imageAlt() ?? 'Product image';

        return $number > 1 ? "{$base} – image {$number}" : $base;
    }
}
