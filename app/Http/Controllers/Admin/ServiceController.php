<?php

namespace App\Http\Controllers\Admin;

use App\Addon;
use App\Sale;
use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index(){
        $data['products'] = Common::getProductsOrServices(2,['0','1']);
        foreach($data['products'] as $product){
            $product->sales = Common::getSale($product->id);
            if($product->category->parent == 1){
                $product->stock = Common::stock($product->id);
            }
            if($product->category->parent == 2){
                $product->stock = '';
            }
        }
        return view('admin.service.list',$data);
    }
    public function create(){
        $data['categories'] = Category::where('parent','2')->get();
        return view('admin.service.add',$data);
    }
    function edit($id){
        $data['product'] = Product::find($id);
        $data['product']->sales = Common::getSale($id);
        $data['categories'] = Category::where('parent','2')->get();
        $data['addons'] = Addon::where('product_id',$id)->get();
        return view('admin.service.edit',$data);
    }
}
