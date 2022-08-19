<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    function product()
    {
        return $this->belongsTo(Product::class, 'p_id', 'id');
    }
}
