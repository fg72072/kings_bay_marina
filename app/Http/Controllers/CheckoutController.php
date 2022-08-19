<?php

namespace App\Http\Controllers;

use App\CartAddon;
use App\Order;
use App\Common;
use App\CartItem;
use App\OrderItem;
use App\Mail\OrderMail;
use App\OrderAddon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class CheckoutController extends Controller
{
    public function index(Request $req)
    {
        $data['cart_items'] = CartItem::where('ip', $req->ip())->with('product')->get();
        foreach ($data['cart_items'] as $cart) {
            $cart->cart_addon = CartAddon::with('addon')->where('cart_item_id', $cart->id)->get();
        }
        $data['calculation'] = Common::calculation($req);
        return view('checkout', $data);
    }

    public function checkout(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'appartment' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
          $array =  [
                'firstname' => $req->firstname,
                'lastname' => $req->lastname,
                'address' => $req->address,
                'appartment' => $req->appartment,
                'country' => $req->country,
                'city' => $req->city,
                'postal_code' => $req->postal_code,
                'phone' => $req->phone,
                'email' => $req->email,
                'order_note' => $req->order_note
          ];
          $order_id = Order::orderBy('id','desc')->pluck('id')->first();
        session()->put('delivery_info',$array);
        return response()->json(['status'=>1,'amount'=>Common::calculation($req)['grandtotal'],'delivery_info'=>$array,'order_id'=>$order_id+1,'payment_method'=>$req->payment_method]);
    }
    }
    public function payment(Request $req)
    {
        $data['cart_items'] = CartItem::where('ip', $req->ip())->with('product')->get();
        foreach ($data['cart_items'] as $cart) {
            $cart->cart_addon = CartAddon::with('addon')->where('cart_item_id', $cart->id)->get();
        }
        $data['calculation'] = Common::calculation($req);
        return view('payment', $data);
        if(session()->get('delivery_info') && $data['cart_items']){
        }
        else{
            return redirect('cart');
        }
    }
    public function placeOrder(Request $req)
    {
        
      
        $info = session()->get('delivery_info');
        $calculation = Common::calculation($req);
        $order = new Order;
        $order->ip = $req->ip();
        $order->subtotal = $calculation['subtotal'];
        $order->tax = $calculation['tax'];
        $order->discount = $calculation['discount'];
        $order->grand_total = $calculation['grandtotal'];
        $order->firstname = $info['firstname'];
        $order->lastname = $info['lastname'];
        $order->address = $info['address'];
        $order->appartment = $info['appartment'];
        $order->country = $info['country'];
        $order->city = $info['city'];
        $order->postal_code = $info['postal_code'];
        $order->phone = $info['phone'];
        $order->email = $info['email'];
        $order->order_note = $info['order_note'];
        $order->save();

        $cart_items = CartItem::where('ip', $req->ip())->get();
        foreach ($cart_items as $cart) {
            $order_item = new OrderItem;
            $order_item->order_id = $order->id;
            $order_item->p_id = $cart->p_id;
            $order_item->price = $cart->price;
            $order_item->discount = $cart->discount;
            $order_item->total = $cart->total;
            $order_item->qty = $cart->qty;
            $order_item->no_of_count = $cart->no_of_count;
            $order_item->date = $cart->date;
            $order_item->from = $cart->from;
            $order_item->to = $cart->to;
            $order_item->type = $cart->type;
            $order_item->form_type = $cart->form_type;
            $order_item->save();

            $addons = CartAddon::where('cart_item_id', $cart->id)->get();
            foreach ($addons as $addon) {
                $order_addon = new OrderAddon;
                $order_addon->order_item_id = $order_item->id;
                $order_addon->addon_id = $addon->addon_id;
                $order_addon->price = $addon->price;
                $order_addon->night_or_guest = $addon->night_or_guest;
                $order_addon->total = $addon->total;
                $order_addon->type = $addon->type;
                $order_addon->save();
            }
        }
        Common::transaction($order->id, '32rrfsdfadfsa', $calculation['grandtotal'], 'stripe', '1');
        CartItem::where('ip', $req->ip())->delete();
        CartAddon::where('ip', $req->ip())->delete();
        Mail::to($info['email'])->send(new OrderMail($order));
        return redirect('thankyou');
    }
}
