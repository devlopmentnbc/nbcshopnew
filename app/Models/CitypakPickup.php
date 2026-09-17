<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CitypakPickup extends Model
{
    use HasFactory;

    protected $fillable = [
        'pickup_number',
        'citypak_pickup_id',
        'pickup_date',
        'pickup_from_time',
        'pickup_to_time',
        'contact_person',
        'contact_number',
        'address_line_1',
        'address_line_2',
        'city',
        'total_orders',
        'total_weight_grams',
        'total_cod_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'total_orders' => 'integer',
        'total_weight_grams' => 'integer',
        'total_cod_amount' => 'decimal:2',
    ];

    /**
     * Get the orders associated with this pickup.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'citypak_pickup_id');
    }

    /**
     * Get formatted weight string (e.g. "2.50 kg" or "750 g").
     */
    public function getFormattedWeightAttribute(): string
    {
        if ($this->total_weight_grams >= 1000) {
            return number_format($this->total_weight_grams / 1000, 2) . ' kg';
        }
        return $this->total_weight_grams . ' g';
    }
}
