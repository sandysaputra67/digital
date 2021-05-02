<?php

namespace App\Http\Resources\Menu;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'restaurant_id' => $this->restaurant_id,
            'image' => $this->image_url,
            'price' => $this->formated_price,
            'position' => $this->position,
            'description' => $this->description,
            'url' => route('restaurant.menu.show', ['restaurant' => $this->restaurant_id, 'menu' => $this->id]),
            'status' => $this->status,
        ];
    }
}
