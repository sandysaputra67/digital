<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Restaurant;

class CartController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $cart = Cart::get();

        return view('restaurant.pages.cart.index', compact('restaurant', 'cart'));
    }

    public function reservation(Restaurant $restaurant)
    {
        $table_id = request('table_id');
        $customer_name = request('customer_name');

        $code = sha1("{$restaurant->id}.{$table_id}.{$customer_name}.{now()->timestamp()}");
        $status = 'active';

        $reservation = Cart::create([
            'restaurant_id' => $restaurant->id,
            'table_id' => $table_id,
            'customer_name' => $customer_name,
            'code' => $code,
            'status' => $status
        ]);

        session()->put([
            'cart_id' => $reservation->id,
            'customer_name' => $customer_name,
            'cart_code' => $code
        ]);

        if ($reservation) {
            return response()->json([
                'status' => 'OK',
                'message' => 'Meja sudah anda pesan.',
                'url' => route('restaurant.menu', $restaurant->id)
            ]);
        }
    }

    public function addToCart()
    {

    }
}
