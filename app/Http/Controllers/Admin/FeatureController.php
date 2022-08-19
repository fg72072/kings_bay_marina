<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index(){
        $setting = Setting::where('section','feature')->first();
        $section = Section::where('section','feature')->get();
        $feature_second = Section::where('section','feature-second')->get();
        return view('admin.sections.feature',compact('setting','section','feature_second'));
    }
    public function store(Request $req){
        if($req->hasFile('icon')){
            $image = $req->file('icon');
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $arry =[
                'heading'=>$req->heading,
                'description'=>$req->description,
                'icon'=>$name
            ];
            $data = new Section;
            $data->section = 'feature-second';
            $data->content = json_encode($arry);
            $data->save();
        }
        else{
            $arry =[
                'heading'=>$req->heading,
                'description'=>$req->description
            ];
            $data = new Section;
            $data->section = 'feature';
            $data->content = json_encode($arry);
            $data->save();
        }
        return redirect()->back();
       
    }
    public function update($id,Request $req){
        $setting = Setting::find($id);
        $arry =[
            'heading'=>$req->heading,
            'subheading'=>$req->subheading,
        ];
        $setting->content = $arry;
        $setting->save();
        return redirect()->back();
    }
    public function subUpdate(Request $req){
        $section = Section::find($req->id);
        if($req->image){
            if ($req->hasFile('icon')) {
                Common::unlinkProfilePic(json_decode($section->content)->icon);
                $image = $req->file('icon');
                $icon  = Common::getFileName($image);
                $path  = Common::getProfilePicPath();
                $image->move($path, $icon);
            }
            else{
                $icon = json_decode($section->content)->icon;
            }
            $arry =[
                'heading'=>$req->heading,
                'description'=>$req->description,
                'icon'=>$icon
            ];
        }
        else{
            $arry =[
                'heading'=>$req->heading,
                'description'=>$req->description,
            ];
        }
        $section->content = $arry;
        $section->save();
        return redirect()->back();
    }
    public function destroy($id){
        $section = Section::find($id)->delete();
        return redirect()->back();
    }


}
