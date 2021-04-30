<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Restaurant\GroupMenus;
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

    public function getMenus(Restaurant $restaurant)
    {
        $all_menus = Menu::where([
            'restaurant_id' => $restaurant->id
        ])->get();

        $group_menus = GroupMenus::where([
            'restaurant_id' => $restaurant->id,
            'main' => true
        ])->first();

        if ($group_menus) {
            $featured_menu = $all_menus->where('group_id', $group_menus->id)->get();
        }

        $menu_with_image = $all_menus->whereNotNull('image',)->get();

        $menu_only_text = $all_menus->whereNull('image',)->get();

        $data = [
            'featured_menus' => $featured_menu,
            'menu_with_image' => $menu_with_image,
            'menu_only_text' => $menu_only_text,
        ];

        return response()->json([
            'status' => 'OK',
            'data_menu' => $data
        ])
    }
}
