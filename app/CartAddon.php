<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartAddon extends Model
{
    //
    function addon()
    {
        return $this->belongsTo(Addon::class, 'addon_id', 'id');
    }
}
