<?php

namespace App;

use App\Sale;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 0 hour
    // 1 day
    // 2 month
    // 3 year

    function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

}
