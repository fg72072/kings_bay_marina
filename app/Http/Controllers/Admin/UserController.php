<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\User;
use App\Common;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $data['users'] = User::get();
        return view('admin.user.list',$data);
    }
    public function create(){
        return view('admin.user.add');
    }
    public function store(Request $req){
        $validate = Request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = new User;
        $user->firstname = $req->first_name;
        $user->lastname = $req->last_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->role = $req->role;
        $user->save();
        return redirect()->back();

    }
    public function edit($id){
        $data['user'] = User::find($id);
        return view('admin.user.edit',$data);
    }
    function destroy($id){
        User::where('id',$id)->where('id','!=',Auth::user()->id)->delete();
    }
    function update($id,Request $req){
        $email_validate = "required";
        if(Auth::user()->id == $id){
        if(Auth::user()->email != $req->email){
            $email_validate = "required|email|unique:users";
        }
        else{

        }
        $validate = Request()->validate([
            'email'=>$email_validate,
            'first_name'=>'required',
            'last_name'=>'required',
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        if (Hash::check($req->current_password, Auth::user()->password)) {
            Auth::user()->update([
                'first_name'=>$req->first_name,
                'last_name'=> $req->last_name,
                'email'=>$req->email,
                'password'=> Hash::make($req->password),
            ]);
            return redirect()->back()->with(['success'=>'Your password has been changed']);
        } else {
            return redirect()->back()->with(['error'=>'The provided password does not match your current password.']);
        }
        }
        else{
            $email_validate = "required";
            $user = User::find($id);
            if($user->email != $req->email){
                $email_validate = "required|email|unique:users";

            }
            $validate = Request()->validate([
                'email'=>$email_validate,
                'first_name'=>'required',
                'last_name'=>'required'
            ]);
            $user->email = $req->email;
            $user->firstname = $req->first_name;
            $user->lastname = $req->last_name;
            $user->save();
        }

        return redirect()->back();
    }
}
