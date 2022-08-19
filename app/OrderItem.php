<?php

namespace App;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    function product()
    {
        return $this->belongsTo(Product::class, 'p_id', 'id');
    }
}
