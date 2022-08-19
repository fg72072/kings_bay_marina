<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Common;
use App\OrderItem;
use App\OrderAddon;
use App\DeliveryStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::with('deliverystatus')->get();
        return view('admin.order.list', $data);
    }
    public function edit($id)
    {
        $order = Order::find($id);
        $order->is_seen = '1';
        $order->save();
        $data['statuses'] = DeliveryStatus::get();
        $data['order'] = Order::with('deliverystatus')->find($id);
        $data['order_items'] = OrderItem::with('product')->where('order_id', $id)->get();
        foreach ($data['order_items'] as $item) {
            $item->cart_addon = OrderAddon::with('addon')->where('order_item_id',$item->id)->get();
        }
        return view('admin.order.edit', $data);
    }
    function destroy($id)
    {
        Order::find($id)->delete();
        OrderItem::where('order_id',$id)->delete();
    }
    function update($id, Request $req)
    {
        $order = Order::find($id);
        $order->firstname = $req->firstname;
        $order->lastname = $req->lastname;
        $order->email = $req->email;
        $order->phone = $req->phone;
        $order->appartment = $req->appartment;
        $order->address = $req->address;
        $order->city = $req->city;
        $order->country = $req->country;
        $order->postal_code = $req->postal_code;
        $order->order_note = $req->note;
        $order->status = $req->status;
        $order->save();
        return redirect()->back();
    }
}
