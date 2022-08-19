<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function store(Request $req){
        Common::addInventory($req,'in');
        return redirect()->back();
    }
}
