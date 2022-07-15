<?php

namespace App\Http\Controllers\Restaurant\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Restaurant;
use App\Models\Restaurant\Menu;

class CartController extends Controller
{
    public function getCart(Restaurant $restaurant)
    {
        $cart = Cart::where([
            'code' => session('cart_code'),
            'status' => 'active'
        ])->with('items', 'items.menu')->first();

        return response()->json([
            'status' => 'OK',
            'data' => CartResource::make($cart)
        ]);
    }

    public function saveCart()
    {
        $cartItem = CartItem::where('id', request('id'))->with('menu')->first();
        $priceMenu = Menu::select('price')->where('id', $cartItem->menu_id)->first();

        $base_total = $priceMenu->price * request('qty');

        $cartItem->quantity = request('qty');
        $cartItem->base_total = $base_total;
        $cartItem->save();

        $cart = $this->updateCart();

        return response()->json([
            'status' => 'OK',
            'data' => CartResource::make($cart)
        ]);
    }

    public function deleteItem($restaurant_id, $item_id)
    {
        CartItem::where('id', $item_id)->delete();

        $cart = $this->updateCart();

        return response()->json([
            'status' => 'OK',
            'data' => CartResource::make($cart)
        ]);
    }

    public function updateCart()
    {
        $cart = Cart::where([
            'code' => session('cart_code'),
            'status' => 'active'
        ])->with('items', 'items.menu')->first();

        $grand_total = 0;
        $total_items = 0;

        foreach ($cart->items as $item) {
            $grand_total = $grand_total + $item->base_total;
            $total_items = $total_items + $item->quantity;
        }

        $cart->total_items = $total_items;
        $cart->grand_total = $grand_total;
        $cart->save();

        return $cart;
    }
}
