<?php

namespace App;

use App\DeliveryStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    function deliverystatus()
    {
        return $this->belongsTo(DeliveryStatus::class, 'status', 'id');
    }
}
