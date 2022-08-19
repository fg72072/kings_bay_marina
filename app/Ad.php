<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function states()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }
}
