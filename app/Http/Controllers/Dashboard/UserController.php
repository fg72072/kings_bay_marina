<?php

namespace App\Http\Controllers\Dashboard;

use App\Ad;
use App\User;
use App\State;
use App\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $data['user'] = session()->get('user');
        return view('dashboard.account', $data);
    }
    public function detail()
    {
        $data['user'] = session()->get('user');
        $data['states'] = State::get();
        return view('dashboard.account-detail', $data);
    }
    public function update(Request $req)
    {
        $user = User::find(session()->get('user')->id);
        $user->firstname = $req->firstname;
        $user->lastname = $req->lastname;
        if ($req->hasFile('avatar')) {
            $image = $req->file('avatar');
            Common::unlinkProfilePic($user->img);
            $name  = Common::getFileName($image);
            $path  = Common::getProfilePicPath();
            $image->move($path, $name);
            $user->img = $name;
        }
        $user->state = $req->state;
        $user->zip_code = $req->zip_code;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->whatsapp = $req->whatsapp;
        $user->web = $req->website;
        $user->save();
        session()->put('user', $user);
        return redirect()->back();
    }
    public function updatePassword(Request $req)
    {
        $validate = Request()->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::find(session()->get('user')->id);
        $user->password = Hash::make($req->password);
        $user->save();
        session()->put('user', $user);
        return redirect()->back()->with('success', 'Password has been updated.');
    }
}
