<?php

namespace App\Models;

use App\Restaurant\Menu;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = "cart_items";

    protected $fillable = [
        'cart_id',
        'menu_id',
        'quantity',
        'base_total',
        'discount_amount',
        'note',
        'status'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
