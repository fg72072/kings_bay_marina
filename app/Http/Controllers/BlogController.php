<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data['blogs'] = Blog::get();
        return view('blog',$data);
    }
    public function singleBlog($id)
    {
        $data['blog'] = Blog::find($id);
        return view('blogdetail',$data);
    }
}
