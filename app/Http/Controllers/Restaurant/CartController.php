<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Restaurant;
use App\Restaurant\Menu;

class CartController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $cart = Cart::where('code', session('cart_code'))->with('items')->get();

        return view('restaurant.pages.cart.index', compact('restaurant', 'cart'));
    }

    public function reservation(Restaurant $restaurant)
    {
        $table_id = request('table_id');
        $customer_name = request('customer_name');

        $code = sha1("{$restaurant->id}.{$table_id}.{$customer_name}.{now()->timestamp()}");
        $status = 'active';

        $reservation = Cart::create([
            'restaurant_id' => $restaurant->id,
            'table_id' => $table_id,
            'customer_name' => $customer_name,
            'code' => $code,
            'status' => $status
        ]);

        session()->put([
            'cart_id' => $reservation->id,
            'customer_name' => $customer_name,
            'cart_code' => $code
        ]);

        if ($reservation) {
            return response()->json([
                'status' => 'OK',
                'message' => 'Meja sudah anda pesan.',
                'url' => route('restaurant.menu', $restaurant->id)
            ]);
        }
    }

    public function addToCart(Restaurant $restaurant)
    {
        $cart = Cart::where([
            'code' => session('cart_code')
        ])->first();

        $menu = Menu::where([
            'id' => request('menu_id')
        ])->first();

        $cartItem = CartItem::where([
            'cart_id' => $cart->id,
            'menu_id' => $menu->id,
        ])->first();

        $base_total = $menu->price * request('qty');

        if ($cartItem) {
            $cartItem->quantity = $cartItem->quantity + request('qty');
            $cartItem->base_total =  $cartItem->base_total + $base_total;
            if (request('note') != "") {
                $cartItem->note = request('note');
            }
            $cartItem->save();
        } else {
            $addToCartItem = CartItem::create([
                'cart_id' => $cart->id,
                'menu_id' => $menu->id,
                'quantity' => request('qty'),
                'base_total' => $base_total,
                'discount_amount' => 0,
                'note' => request('note'),
                'status' => 'pending'
            ]);
        }

        return response()->json([
            'status' => 'OK',
            'message' => 'Menu sudah masuk ke keranjang.',
            'redirect' => route('cart.index', $restaurant->id)
        ]);
    }

    public function getCart(Restaurant $restaurant)
    {
        $cart = Cart::where([
            'code' => session('cart_code'),
            'status' => 'active'
        ])->with('items', 'items.menu')->first();

        return response()->json([
            'status' => 'OK',
            'data_cart' => $cart
        ]);
    }
}
