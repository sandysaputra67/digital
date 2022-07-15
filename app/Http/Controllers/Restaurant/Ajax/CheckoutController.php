<?php

namespace App\Http\Controllers\Restaurant\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Restaurant;

class CheckoutController extends Controller
{
    public function checkout(Restaurant $restaurant)
    {
        $updateItems = CartItem::with(["cart" => function($q) {
            $q->where([
                'code' => session('cart_code'),
                'status' => 'active'
            ]);
        }])->where('status', 'draft')->update([
            'status' => 'pending'
        ]);

        if ($updateItems) {
            return response()->json([
                'status' => 'Error',
                'redirect' => route('restaurant.checkout.success', $restaurant->id)
            ]);
        }

        return response()->json([
            'status' => 'OK',
            'redirect' => route('restaurant.checkout.success', $restaurant->id)
        ]);
    }
}
