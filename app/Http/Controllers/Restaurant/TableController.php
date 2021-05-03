<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Restaurant;
use App\Models\Restaurant\Table;

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
}
