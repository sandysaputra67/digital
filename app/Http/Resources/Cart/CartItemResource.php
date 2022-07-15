<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Menu\MenuResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'base_total' => (int) $this->base_total,
            'base_total_formated' => $this->formated_base_total,
            'cart_id' => $this->cart_id,
            'discount_amount' => $this->formated_discount_amount,
            'menu_id' => $this->menu_id,
            'note' => $this->note,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'menu' => MenuResource::make($this->menu),
        ];
    }
}
