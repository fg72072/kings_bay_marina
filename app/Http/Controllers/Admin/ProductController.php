<?php

namespace App\Http\Controllers\Admin;

use App\Sale;
use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Common::getProductsOrServices(1, ['0', '1']);
        foreach ($data['products'] as $product) {
            $product->sales = Common::getSale($product->id);
            if ($product->category->parent == 1) {
                $product->stock = Common::stock($product->id);
            }
            if ($product->category->parent == 2) {
                $product->stock = '';
            }
        }
        return view('admin.product.list', $data);
    }
    public function create()
    {
        $data['categories'] = Category::where('parent', '1')->get();
        return view('admin.product.add', $data);
    }
    public function store(Request $req)
    {
        $product = new Product;
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $product->img = $name;
        }
        $product->title = $req->title;
        $product->cat_id = $req->category;
        $product->price = $req->price;
        $product->min_limit = $req->min;
        $product->max_limit = $req->max;
        $product->min_guest = $req->min_guest;
        $product->max_guest = $req->max_guest;
        $product->short_intro = $req->short_intro;
        if ($product->weekend_price) {
            $product->weekend_price = $req->weekend_price;
        } else {
            $product->weekend_price = 0;
        }
        if ($req->label) {
            $product->label = $req->label;
        } else {
            $product->label = "Quantity";
        }
        $product->weekend_type = $req->weekend_type;
        $product->steps = $req->steps;
        $product->menu = $req->menu;
        $product->description = $req->description;
        $product->form_type = $req->form_type;
        if ($req->qty) {
            $product->qty = $req->qty;
        }
        if ($req->no_of_count) {
            $no_of_count = implode(',', $req->no_of_count);
            $product->no_of_count = $no_of_count;
        }
        $product->save();
        if ($req->sale == 1) {
            $sale = new Sale;
            $sale->product_id = $product->id;
            $sale->start_date = $req->sale_start;
            $sale->end_date = $req->sale_end;
            $sale->start_time = $req->start_time;
            $sale->end_time = $req->end_time;
            $sale->sale_price = $req->sale_price;
            $sale->save();
        }
        return redirect()->back();
    }
    function destroy($id)
    {
        Common::deleteProduct($id);
    }
    function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['product']->sales = Common::getSale($id);
        $data['categories'] = Category::where('parent', '1')->get();
        return view('admin.product.edit', $data);
    }
    function update(Request $req, $id)
    {
        $salessss = Sale::where('product_id', $id)->delete();
        $product = Product::find($id);
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            Common::unlinkProfilePic($product->img);
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $product->img = $name;
        }
        $product->title = $req->title;
        $product->cat_id = $req->category;
        $product->price = $req->price;
        $product->min_limit = $req->min;
        $product->max_limit = $req->max;
        $product->min_guest = $req->min_guest;
        $product->max_guest = $req->max_guest;
        $product->weekend_type = $req->weekend_type;

        if ($req->weekend_price) {
            $product->weekend_price = $req->weekend_price;
        }
        if ($req->label) {
            $product->label = $req->label;
        } else {
            $product->label = "Quantity";
        }
        $product->steps = $req->steps;
        $product->status = $req->status;
        $product->short_intro = $req->short_intro;
        $product->description = $req->description;
        $product->menu = $req->menu;

        $product->form_type = $req->form_type;
        if ($req->qty) {
            $product->qty = $req->qty;
        }
        if ($req->no_of_count) {
            $no_of_count = implode(',', $req->no_of_count);
            $product->no_of_count = $no_of_count;
        }
        $product->save();
        if ($req->sale == 1) {
            $sale = new Sale;
            $sale->product_id = $id;
            $sale->start_date = $req->sale_start ?? date("m-d-Y H:i");
            $sale->end_date = $req->sale_end ?? date("m-d-Y H:i");
            $sale->sale_price = $req->sale_price;
            if ($req->sale_price) {
                $sale->discount = $product->price - $req->sale_price;
            }
            $sale->discount = 0;
            $sale->save();
        }
        return redirect()->back();
    }
}
