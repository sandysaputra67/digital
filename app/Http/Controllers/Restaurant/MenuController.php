<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Restaurant\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return view('restaurant.pages.menu.index', compact('restaurant'));
    }

    public function show(Restaurant $restaurant, $menu)
    {
        return view('restaurant.pages.menu.show', compact('restaurant', 'menu'));
    }
}
