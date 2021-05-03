<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Resources\Menu\FeaturedMenuDataResource;
use App\Http\Resources\Menu\MenuResource;
use App\Models\Restaurant;
use App\Models\Restaurant\GroupMenu;
use App\Models\Restaurant\Menu;

class MenuController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return view('restaurant.pages.menu.index', compact('restaurant'));
    }

    public function show(Restaurant $restaurant, Menu $menu)
    {
        return view('restaurant.pages.menu.show', compact('restaurant', 'menu'));
    }

    public function showMenuById(Restaurant $restaurant, $menu_id)
    {
        $menu = Menu::where([
            'id' => $menu_id,
            'restaurant_id' => $restaurant->id,
        ])->first();

        return MenuResource::make($menu);
    }

    public function getMenus(Restaurant $restaurant)
    {
        $data = [
            'featured_menus' => null,
            'menu_with_image' => null,
            'menu_only_text' => null,
        ];

        $all_menus = Menu::where([
            'restaurant_id' => $restaurant->id
        ])->get();

        $group_menus = GroupMenu::where([
            'restaurant_id' => $restaurant->id,
            'main' => true
        ])->first();

        $menu_with_image = $all_menus->whereNotNull('image')->sortBy('position')->where('status', 'menu');

        $menu_only_text = $all_menus->whereNull('image')->sortBy('position')->where('status', 'menu')->all();

        if ($group_menus) {
            $data['featured_menus'] = [
                'featured_data' => FeaturedMenuDataResource::make($group_menus),
                'menus' => MenuResource::collection($all_menus->sortBy('position')->where('group_id', $group_menus->id))
            ];
        }

        if ($menu_with_image) {
            $data['menu_with_image'] = MenuResource::collection($menu_with_image);
        }

        if ($menu_only_text) {
            $data['menu_only_text'] = MenuResource::collection($menu_only_text);
        }

        return response()->json([
            'status' => 'OK',
            'data_menu' => $data
        ]);
    }
}
