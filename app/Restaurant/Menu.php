<?php

namespace App\Restaurant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    public function getImageUrlAttribute()
    {
        if ($this->attributes['image'] != null) {
            $this->attributes['image'] = Storage::disk('public')->url("/menu/images/{$this->image}");
        }

        return $this->attributes['image'];
    }

    public function getFormatedPriceAttribute()
    {
        return $this->attributes['price'] == null ? number_format(0, ',', ',', 0) : "Rp. " . number_format($this->attributes['price'], 0, ',', ',');
    }
}
