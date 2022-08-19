<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::get();
        return view('admin.blog.list',$data);
    }
    public function create(){
        return view('admin.blog.add');
    }
    public function store(Request $req){
        $blog = new Blog;
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $blog->img = $name;
        }
        $blog->title = $req->title;
        $blog->short_intro = $req->short_intro;
        $blog->description = $req->description;
        $blog->save();
        return redirect()->back();

    }
    public function edit($id){
        $data['blog'] = Blog::find($id);
        return view('admin.blog.edit',$data);
    }
    function destroy($id){
        Blog::find($id)->delete();
    }
    function update($id,Request $req){
        $blog = Blog::find($id);
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            Common::unlinkProfilePic($blog->img);
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $blog->img = $name;

        }
        $blog->title = $req->title;
        $blog->short_intro = $req->short_intro;
        $blog->description = $req->description;
        $blog->save();
        return redirect()->back();
    }
}
