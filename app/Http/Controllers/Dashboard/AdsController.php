<?php

namespace App\Http\Controllers\Dashboard;

use App\Ad;
use App\State;
use App\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{

    public function index(Request $req)
    {
        $data['ads'] = Ad::where('user_id', session()->get('user')->id);
        if ($req->search) {
            $data['ads'] = $data['ads']->where('title', 'Like', '%' . $req->search . '%');
        }
        $data['ads'] = $data['ads']->get();
        foreach ($data['ads'] as $ads) {
            $ads->views = Common::noOfViews($ads->id);
        }
        return view('dashboard.my-listing', $data);
    }
    public function create()
    {
        $data['user'] = session()->get('user');
        $data['states'] = State::get();
        return view('dashboard.add-ads', $data);
    }
    public function store(Request $req)
    {
        $ad = new Ad;
        $ad->user_id = session()->get('user')->id;
        $ad->title = $req->title;
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $ad->img = $name;
        }
        $ad->type = $req->type;
        $ad->price_type = $req->price_type;
        $ad->price = $req->price;
        $ad->video = $req->video;
        $ad->description = $req->description;
        $ad->state = $req->state;
        $ad->city = $req->city;
        $ad->zip_code = $req->zip_code;
        $ad->address = $req->address;
        $ad->phone = $req->phone;
        $ad->whatsapp = $req->whatsapp;
        $ad->email = $req->email;
        $ad->web = $req->website;
        $ad->save();
        return redirect()->back();
    }
    function destroy($id)
    {
        $ad = Ad::where('id', $id)->where('user_id', session()->get('user')->id)->delete();
        return redirect()->back();
    }
}
