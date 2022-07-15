<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Menu\GroupMenuResource;
use App\Http\Resources\Menu\MenuResource;
use App\Models\Restaurant;
use App\Models\Restaurant\GroupMenu;
use App\Restaurant\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return MenuResource::collection($restaurant->menus);
    }

    public function show(Restaurant $restaurant, Menu $menu)
    {
        ($menu->restaurant_id != $restaurant->id) && abort(404);

        return MenuResource::make($menu);
    }

    public function featured(Restaurant $restaurant)
    {
        $groupMenu = GroupMenu::where([
            'restaurant_id' => $restaurant->id,
            'main' => true
        ])->first();

        return GroupMenuResource::make($groupMenu);
    }
}
