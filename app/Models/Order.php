<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'order_type',
        'name',
        'phone',
        'email',
        'billing_address_line1',
        'billing_address_line2',
        'billing_city',
        'billing_state',
        'billing_postal_code',
        'billing_country',
        'delivery_same_as_billing',
        'delivery_address_line1',
        'delivery_address_line2',
        'delivery_city',
        'delivery_state',
        'delivery_postal_code',
        'delivery_country',
        'notes',
        'payment_method',
        'payment_status',
        'payment_slip',
        'subtotal_lkr',
        'shipping_fee_lkr',
        'total_lkr',
        'status',
        'citypak_order_id',
        'citypak_tracking_number',
        'citypak_status',
        'citypak_delivery_facility_code',
        'citypak_dispatched_at',
        'citypak_tracking_history',
        'citypak_pickup_id',
    ];

    protected $casts = [
        'delivery_same_as_billing' => 'boolean',
        'subtotal_lkr' => 'decimal:2',
        'shipping_fee_lkr' => 'decimal:2',
        'total_lkr' => 'decimal:2',
        'citypak_dispatched_at' => 'datetime',
        'citypak_tracking_history' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function citypakPickup(): BelongsTo
    {
        return $this->belongsTo(CitypakPickup::class, 'citypak_pickup_id');
    }

    /**
     * Calculate total weight of order items in grams.
     */
    public function getTotalWeightGramsAttribute(): int
    {
        $weight = 0;
        $this->loadMissing(['items.product.attributeValues', 'items.attributeValue']);
        foreach ($this->items as $item) {
            $itemWeight = null;
            if ($item->product && $item->attribute_value_id) {
                $variant = $item->product->attributeValues->firstWhere('id', (int) $item->attribute_value_id);
                if ($variant && isset($variant->pivot->weight_grams) && $variant->pivot->weight_grams !== null && (int)$variant->pivot->weight_grams > 0) {
                    $itemWeight = (int) $variant->pivot->weight_grams;
                }
            }
            if ($itemWeight === null) {
                $itemWeight = ($item->product && !empty($item->product->weight_grams)) ? floatval($item->product->weight_grams) : 500;
            }
            $weight += ($itemWeight * max(1, intval($item->quantity)));
        }
        return intval($weight > 0 ? $weight : 500);
    }
}
