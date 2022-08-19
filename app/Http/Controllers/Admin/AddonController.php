<?php

namespace App\Http\Controllers\Admin;

use App\Addon;
use App\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddonController extends Controller
{
    public function store(Request $req){
        $addon = new Addon;
        $addon->product_id = $req->product_id;
        $addon->title = $req->title;
        $addon->price = $req->price;
        $addon->min_limit = $req->min;
        $addon->max_limit = $req->max;
        $addon->is_input = $req->is_input;
        $addon->is_bedroom = $req->is_bedroom;
        $addon->type = $req->type;
        $addon->save();
        return redirect()->back();

    }
    function destroy($id){
        Common::deleteAddon($id);
    }
    function update(Request $req){
        $addon = Addon::where('id',$req->addon_id)->first();
        $addon->title = $req->title;
        $addon->price = $req->price;
        $addon->min_limit = $req->min;
        $addon->max_limit = $req->max;
        $addon->is_input = $req->is_input;
        $addon->is_bedroom = $req->is_bedroom;
        $addon->type = $req->type;
        $addon->save();
        return redirect()->back();
    }
}
