<?php

namespace App\Http\Controllers\Admin;


use App\Common;
use App\Section;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $data['firstsetting'] = Setting::where('section', 'contact-first')->first();
        $data['firstsection'] = Section::where('section', 'contact-first')->first();
        $data['secondsetting'] = Setting::where('section', 'contact-second')->first();
        $data['secondsection'] = Section::where('section', 'contact-second')->first();
        $data['settingsection'] = Section::where('section', 'contact-setting')->first();
        return view('admin.cms.contact',$data);
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
            $arry = [
                'description' => $req->description,
            ];
            $section->content = $arry;
            $section->save();
        }
        return back();
    }

    public function updateSetting($id, Request $req)
    {
        $section = Section::find($id);
        $arry = [
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
            'city' => $req->city,
            'available' => $req->available
        ];
        $section->content = $arry;
        $section->save();
        return back();
    }
}
