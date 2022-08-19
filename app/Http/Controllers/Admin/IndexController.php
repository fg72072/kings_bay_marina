<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Blog;
use App\User;
use App\Order;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $data['total_user'] = User::count();
        $data['total_product'] = Product::count();
        $data['total_ads'] = Ad::count();
        $data['total_order'] = Order::count();
        $data['total_blog'] = Blog::count();
        $data['total_category'] = Category::count();
        return view('admin.index',$data);
    }
}
