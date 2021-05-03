<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GroupMenu extends Model
{

    public function getImageUrlAttribute()
    {
        if ($this->attributes['image'] != null) {
            $this->attributes['image'] = Storage::disk('public')->url("/featured-menu/images/{$this->image}");
        }

        return $this->attributes['image'];
    }
}
