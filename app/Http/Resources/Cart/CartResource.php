<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'restaurant_id' => $this->restaurant_id,
            'table_id' => $this->table_id,
            'discount_amount' => $this->discount_amount,
            'code' => $this->code,
            'parent_id' => $this->parent_id,
            'total_items' => $this->total_items,
            'grand_total' => $this->formated_grand_total,
            'base_total_items' => $this->base_total_items,
            'formated_base_total_items' => $this->formated_base_total_items,
            'discount_amount' => $this->formated_discount_amount,
            'status' => $this->status,
            'items' => CartItemResource::collection($this->items),
        ];
    }
}
