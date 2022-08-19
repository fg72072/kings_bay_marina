<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Common;
use App\View;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        $data['ads'] = Ad::with('user')->where('status','1')->get();
        foreach($data['ads'] as $ads){
            $ads->views = Common::noOfViews($ads->id);
        }
        return view('ads',$data);
    }
    public function singleAds($id,Request $req){
        $data['ads'] = Ad::with('user')->where('id',$id)->where('status','1')->first();
        $view = View::where('ads_id',$id)->where('ip',$req->ip())->first();
        if($view){

        }
        else{
            $ad = new View;
            $ad->ads_id = $id;
            $ad->ip = $req->ip();
            $ad->no_of_view = 1;
            $ad->save();
        }
        $data['ads']->views = Common::noOfViews($id);
        return view('adsdetail',$data);
    }
}
