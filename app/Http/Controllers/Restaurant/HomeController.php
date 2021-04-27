<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return view('restaurant.pages.home', compact('restaurant'));
    }
}
