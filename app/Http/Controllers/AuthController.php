<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(){
        if(empty(session()->get('user'))){
            return view('account');
        }
        else{
        return redirect('/user/account');
        }
    }
    public function register(Request $req){
        $validate = Request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = new User;
        $user->firstname = $req->first_name;
        $user->lastname = $req->last_name;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->role = '0';
        $user->save();
        session()->put('user',$user);
        return redirect('/user/account');
    }
    public function login(Request $req){
        $user = User::where('email',$req->email)->first();
        $password = Hash::make($req->password);
        if($user && $user->role == 0){
        if(Hash::check($req->password,$user->password)){
            session()->put('user',$user);
            return redirect('/user/account');
        }
        else{
            return redirect()->back()->with('error','These credentials do not match our records.');
        }
        }
        else{
            return redirect()->back()->with('error','These credentials do not match our records.');
        }

    }
    public function logout(){
        session()->put('user','');
        return redirect('/account');
    }
}
