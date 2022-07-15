<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class CheckoutController extends Controller
{
    public function successCheckout(Restaurant $restaurant)
    {
        return view('restaurant.pages.checkout.success-checkout', compact('restaurant'));
    }
}
