<?php

namespace App\Http\Controllers;

use App\Addon;
use App\CartAddon;
use App\Common;
use App\Product;
use App\CartItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $req)
    {
       $sort = $req->sort;
       $products = Product::whereHas('category', function ($q)  {
            $q->where('parent','1');
        })->where('status','1');
        if($req->sort == "high-to-low"){
            $products = $products->orderBy('price','desc');
        }
        if($req->sort == "low-to-high"){
            $products = $products->orderBy('price','ASC');
        }
        $products = $products->get();
        foreach($products as $product){
            $product->sales = Common::getSale($product->id);
        }
        return view('product',compact('products','sort'));
    }
    public function productDetail($id, Request $req)
    {
        $data['product'] = Product::find($id);
        $data['cart_item'] = CartItem::where('ip', $req->ip())->where('p_id', $id)->first();
        if ($data['product']->category->parent == 1) {
            $data['product']->stock = Common::stock($data['product']->id);
        }
        if ($data['product']->category->parent == 2) {
            $data['product']->stock = '';
        }
        $data['ip'] = $req->ip();
        $data['addons'] = Addon::where('product_id',$id)->get();
        $data['cart_addons'] = CartAddon::where('ip',$req->ip());
        $data['product']->sales = Common::getSale($id);
        return view('productdetail', $data);
    }
}
