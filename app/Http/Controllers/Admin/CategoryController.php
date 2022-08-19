<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $data['categories'] = Category::get();
        return view('admin.category.add',$data);
    }
    public function store(Request $req){
        $category = new Category;
        $category->title = $req->title;
        $category->parent = $req->category;
        $category->save();
        return redirect()->back();

    }
    function destroy($id){
        Common::deleteCategory($id);
    }
    function update(Request $req){
        $category = Category::find($req->id);
        $category->title = $req->heading;
        $category->save();
        return redirect()->back();
    }
}
