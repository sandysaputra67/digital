<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            $this->image = Storage::disk('public')->url("/menu/images/{$this->image}");
        }

        return $this->image;
    }

    public function getFormatedPriceAttribute()
    {
        return $this->price == null ? number_format(0, ',', ',', 0) : "Rp. " . number_format($this->price, 0, ',', ',');
    }
}
