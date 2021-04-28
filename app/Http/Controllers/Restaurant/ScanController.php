<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return view('restaurant.pages.scan-qr', compact('restaurant'));
    }
}
