<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Common;
use App\Section;
use App\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['products'] = Common::getProductsOrServices(2,['1']);
        $data['count'] = count($data['products']) /2;
        $data['blogs'] = Blog::get();
        $data['first_setting'] = Setting::where('section','first')->first();
        $data['first_section'] = Section::where('section','first')->first();
        $data['second_setting'] = Setting::where('section','second')->first();
        $data['second_section'] = Section::where('section','second')->get();
        $data['third_setting'] = Setting::where('section','third')->first();
        $data['third_section'] = Section::where('section','third')->first();
        return view('index', $data);
    }
    public function about()
    {
        $data['first_setting'] = Setting::where('section','about-first')->first();
        $data['first_section'] = Section::where('section','about-first')->first();
        $data['second_setting'] = Setting::where('section','about-second')->first();
        $data['second_section'] = Section::where('section','about-second')->first();

        return view('about',$data);
    }
}
