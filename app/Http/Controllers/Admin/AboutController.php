<?php

namespace App\Http\Controllers\Admin;


use App\Common;
use App\Section;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $data['firstsetting'] = Setting::where('section', 'about-first')->first();
        $data['firstsection'] = Section::where('section', 'about-first')->first();
        $data['secondsetting'] = Setting::where('section', 'about-second')->first();
        $data['secondsection'] = Section::where('section', 'about-second')->first();
        return view('admin.cms.about',$data);
    }
    public function updateFirst($id, Request $req)
    {
        $setting = Setting::find($id);
        $setting->content = ['heading' => $req->heading];
        $setting->save();
        if ($req->section_id) {
            $section = Section::find($req->section_id);
            if ($req->hasFile('image1')) {
                Common::unlinkProfilePic(json_decode($section->content)->image);
                $image1 = $req->file('image1');
                $name1  = Common::getFileName($image1);
                $path  = Common::getProfilePicPath();
                $image1->move($path, $name1);
            } else {
                $name1 = json_decode($section->content)->image;
            }
            $arry = [
                'image' => $name1,
            ];
            $section->content = $arry;
            $section->save();
        }
        return back();
    }

    public function updateSecond($id, Request $req)
    {
        $setting = Setting::find($id);
        $setting->content = ['heading' => $req->heading];
        $setting->save();
        if ($req->section_id) {
            $section = Section::find($req->section_id);
            if ($req->hasFile('image1')) {
                Common::unlinkProfilePic(json_decode($section->content)->image1);
                $image1 = $req->file('image1');
                $name1  = Common::getFileName($image1);
                $path  = Common::getProfilePicPath();
                $image1->move($path, $name1);
            } else {
                $name1 = json_decode($section->content)->image1;
            }
            if ($req->hasFile('image2')) {
                Common::unlinkProfilePic(json_decode($section->content)->image2);
                $image2 = $req->file('image2');
                $name2  = Common::getFileName($image2);
                $path  = Common::getProfilePicPath();
                $image2->move($path, $name2);
            } else {
                $name2 = json_decode($section->content)->image2;
            }
            $arry = [
                'description' => $req->description,
                'image1' => $name1,
                'image2' => $name2
            ];
            $section->content = $arry;
            $section->save();
        }
        return back();
    }
}
