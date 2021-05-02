<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'restaurant_id',
        'table_id',
        'customer_name',
        'code',
        'parent_id',
        'total_items',
        'grand_total',
        'discount_amount',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
