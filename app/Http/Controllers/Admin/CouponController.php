<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Product;
use App\Category;
use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index(){
        $data['coupons'] = Coupon::get();
        return view('admin.coupon.list',$data);
    }
    public function create(){
        return view('admin.coupon.add');
    }
    public function store(Request $req){
        $coupon = new Coupon;
        $coupon->code = $req->code;
        $coupon->amount = $req->amount;
        $coupon->expiry = $req->expiry;
        $coupon->min_spend = $req->min_spend;
        $coupon->max_spend = $req->max_spend;
        $coupon->limit_per_user = $req->limit_per_user;
        $coupon->save();
        return redirect()->back();

    }
    public function edit($id){
        $data['coupon'] = Coupon::find($id);
        return view('admin.coupon.edit',$data);
    }
    function destroy($id){
        Coupon::find($id)->delete();
    }
    function update($id,Request $req){
        $coupon = Coupon::find($id);
        $coupon->amount = $req->amount;
        $coupon->expiry = $req->expiry;
        $coupon->min_spend = $req->min_spend;
        $coupon->max_spend = $req->max_spend;
        $coupon->limit_per_user = $req->limit_per_user;
        $coupon->save();
        return redirect()->back();
    }
}
