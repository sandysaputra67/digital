<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Restaurant;
use App\Restaurant\Table;

class TableController extends Controller
{
    public function findTable(Restaurant $restaurant)
    {
        $table = Table::where([
            'restaurant_id' => $restaurant->id,
            'code' => request('table')
        ])->first();

        if (!$table) {
            return response()->json([
                'status' => 'error',
                'message' => 'Meja tidak ditemukan'
            ]);
        }

        $cart = Cart::where([
            'table_id' => $table->id,
            'status' => 'active'
        ])->first();

        if ($cart) {
            return response()->json([
                'status' => 'error',
                'message' => 'Meja masih digunakan.'
            ]);
        }

        return response()->json([
            'status' => 'OK',
            'message' => 'Meja dapat digunakan.',
            'table_id' => $table->id
        ]);
    }

    public function reservation(Restaurant $restaurant)
    {
        $table_id = request('table_id');
        $customer_name = request('customer_name');

        $code = sha1("{$restaurant->id}.{$table_id}.{$customer_name}.{now()->timestamp()}");
        $status = 'active';

        $reservation = Cart::insert([
            'restaurant_id' => $restaurant->id,
            'table_id' => $table_id,
            'customer_name' => $customer_name,
            'code' => $code,
            'status' => $status
        ]);

        if ($reservation) {
            return response()->json([
                'status' => 'OK',
                'message' => 'Meja sudah anda pesan.'
            ]);
        }
    }
}
