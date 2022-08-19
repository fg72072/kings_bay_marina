<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Blog;
use App\User;
use App\Order;
use App\Common;
use App\Product;
use App\Section;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    public function firstSection()
    {
        $data['firstsetting'] = Setting::where('section', 'first')->first();
        $data['firstsection'] = Section::where('section', 'first')->first();
        $data['secondsetting'] = Setting::where('section', 'second')->first();
        $data['secondsection'] = Section::where('section', 'second')->get();
        $data['thirdsetting'] = Setting::where('section', 'third')->first();
        $data['thirdsection'] = Section::where('section', 'third')->first();
        $data['settingsection'] = Section::where('section', 'setting')->first();
        return view('admin.cms.first',$data);
    }
    public function updateFirst($id, Request $req)
    {
        $setting = Setting::find($id);
        $setting->content = ['heading' => $req->heading];
        $setting->save();
        if ($req->section_id) {
            $section = Section::find($req->section_id);
            if ($req->hasFile('image')) {
                Common::unlinkProfilePic(json_decode($section->content)->image);
                $image = $req->file('image');
                $name  = Common::getFileName($image);
                $path  = Common::getProfilePicPath();
                $image->move($path, $name);
            } else {
                $name = json_decode($section->content)->image;
            }
            $arry = [
                'description' => $req->description,
                'image' => $name
            ];
            $section->content = $arry;
            $section->save();
        }
        return back();
    }

    public function secondSection()
    {
        $setting = Setting::where('section', 'second')->first();
        $section = Section::where('section', 'second')->get();
        return view('admin.cms.second', compact('setting', 'section'));
    }
    public function store(Request $req)
    {
        $section = new Section;
        $section->content = $req->heading;
        $section->section = 'second';
        $section->save();
        return back();
    }

    public function thirdSection()
    {
        $setting = Setting::where('section', 'third')->first();
        $section = Section::where('section', 'third')->first();
        return view('admin.cms.third', compact('setting', 'section'));
    }
    public function settingSection()
    {
        $section = Section::where('section', 'setting')->first();
        return view('admin.cms.setting', compact('section'));
    }

    public function updateSetting($id, Request $req)
    {
        $section = Section::find($id);
        $arry = [
            'email' => $req->email,
            'phone' => $req->phone,
            'location' => $req->location,
        ];
        $section->content = $arry;
        $section->save();
        return back();
    }
    public function destroy($id)
    {
        Section::find($id)->delete();
    }
}
