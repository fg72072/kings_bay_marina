<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Blog;
use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function index(){
        $data['ads'] = Ad::with('user')->get();
        return view('admin.ads.list',$data);
    }
    public function create(){
        return view('admin.ads.add');
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
        $data['ads'] = Ad::find($id);
        return view('admin.ads.edit',$data);
    }
    function destroy($id){
        Blog::find($id)->delete();
    }
    function update($id,Request $req){
        $ad = Ad::find($id);
        $ad->title = $req->title;
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            Common::unlinkProfilePic($ad->img);
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $ad->img = $name;

        }
        $ad->type = $req->type;
        $ad->status = $req->status;
        $ad->price_type = $req->price_type;
        $ad->price = $req->price;
        $ad->video = $req->video;
        $ad->description = $req->description;
        $ad->save();
        return redirect()->back();
    }
}
