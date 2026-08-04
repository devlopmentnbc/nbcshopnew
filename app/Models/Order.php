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
        'subtotal_lkr',
        'shipping_fee_lkr',
        'total_lkr',
        'status',
    ];

    protected $casts = [
        'delivery_same_as_billing' => 'boolean',
        'subtotal_lkr' => 'decimal:2',
        'shipping_fee_lkr' => 'decimal:2',
        'total_lkr' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
