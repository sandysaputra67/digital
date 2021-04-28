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
}
