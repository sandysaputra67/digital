<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class QrController extends Controller
{
    public function scan(Restaurant $restaurant)
    {
        return view('restaurant.pages.scan-qr', compact('restaurant'));
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurant.pages.show-qr', compact('restaurant'));
    }
}
