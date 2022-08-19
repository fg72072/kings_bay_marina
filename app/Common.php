<?php

namespace App;

use App\Product;
use App\CartItem;
use App\Category;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    public static function getFileName($image)
    {
        return time() . '.' . str_replace(' ', '_', strtolower($image->getClientOriginalName()));
    }


    public static function getProfilePicPath()
    {
        return public_path() . "/front/img/";
    }
    public static function unlinkProfilePic($file)
    {
        $file_path = Common::getProfilePicPath();
        $file = $file_path . $file;
        // return $file;
        if (file_exists($file)) {
            @unlink($file);
            // return true;
        }

        // return false;
    }
    public static function getProductsOrServices($type,$arry)
    {
        $data = Product::with('category')->whereHas('category', function ($q) use ($type) {
            $q->where('parent', $type);
        })->whereIn('status',$arry)->get();
        foreach($data as $product){
            if($product->category->parent == 1){
                $product->stock = Common::stock($product->id);
            }
            if($product->category->parent == 2){
                $product->stock = '';
            }
            $sales = Sale::where('product_id',$product->id)->first();
            if($sales){
                $product->sales = $sales;
            }
            else{
                $product->sales = '';
            }
        }
        return $data;
    }
    public static function calculation($req)
    {
        $addon_total = CartAddon::where('ip', $req->ip())->sum('total');
        $subtotal = CartItem::where('ip', $req->ip())->sum('total')+$addon_total;
        $discount = CartItem::where('ip', $req->ip())->sum('discount');
        $coupon_discount = Common::getCouponDetail($req)['coupon_discount'];
        $total_discount = $discount + $coupon_discount;
        $data = ['subtotal' => $subtotal, 'tax' => 0, 'discount' => $total_discount, 'grandtotal'=> $subtotal-$coupon_discount+$addon_total];
        return $data;
    }
    public static function getCouponDetail($req){
        $cart = Cart::where('ip',$req->ip())->first();
        $coupon_discount = 0;
        $code = '';
        if($cart){
            $coupon_discount = $cart->coupon_discount;
            $code = $cart->code;
        }
        $data = ['coupon_discount' => $coupon_discount,'code'=>$code];
        return $data;
    }
    public static function cartTotal($req)
    {
        $calc = Common::calculation($req);
        $cart = Cart::where('ip',$req->ip())->first();
        if($cart){
            $cart->subtotal = $calc['subtotal'];
            $cart->discount = $calc['discount'];
            $cart->grand_total = $calc['subtotal'] - $cart->coupon_discount;
            $cart->save();
        }
    
    }
    public static function applyCoupon($req,$code,$coupon_discount)
    {
        $calc = Common::calculation($req);
        $carts = Cart::where('ip',$req->ip())->first();
        if($carts){
            $carts->subtotal = $calc['subtotal'];
            $carts->discount = $calc['discount'];
            $carts->coupon_code = $code;
            $carts->coupon_discount = $coupon_discount;
            $carts->grand_total = $calc['subtotal'] - $carts->coupon_discount;
            $carts->save();
        }
        else{
            $cart = new Cart;
            $cart->ip = $req->ip();
            $cart->subtotal = $calc['subtotal'];
            $cart->discount = $calc['discount'];
            $cart->coupon_code = $code;
            $cart->coupon_discount = $coupon_discount;
            $cart->grand_total = $calc['subtotal'] - $cart->coupon_discount;
            $cart->save(); 
        }
        
    }
    public static function checkSpend($req)
    {
        $cart_coupon = Cart::where('ip',$req->ip())->first();
       
        if($cart_coupon){
            $coupon = Coupon::where('code',$cart_coupon->coupon_code)->first();
            $subtotal = Common::calculation($req);
            if($subtotal['subtotal'] >= $coupon->min_spend && $coupon->max_spend <= $subtotal['subtotal']){
            }
            else{
                Cart::where('ip',$req->ip())->where('coupon_code',$cart_coupon->coupon_code)->delete();
            }
        }
    }
    public static function stock($id){
        $stockin = Inventory::where('p_id',$id)->where('stock_type','in')->sum('qty');
        $stockout = Inventory::where('p_id',$id)->where('stock_type','out')->sum('qty');
        $result = $stockin - $stockout;
        return $result;
    }
    public static function addInventory($req,$stock_type){
        $stock = new Inventory;
        $stock->p_id = $req->id;
        $stock->qty = $req->qty;
        $stock->purchase_price = $req->price;
        $stock->total_purchase_price = $req->price * $req->qty;
        $stock->stock_type = $stock_type;
        $stock->save();
    }
    public static function getCategroyParent($id){
        $data = Category::where('id',$id)->first();
        return $data->parent;
    }
    public static function transaction($order_id,$txn_id,$total,$type,$status){
        $trans = new Transaction;
        $trans->order_id = $order_id;
        $trans->txn_id = $txn_id;
        $trans->total = $total;
        $trans->payment_type = $type;
        $trans->status = $status;
        $trans->save();
    }
    public static function serviceStock($id,$req){
        $stock = 0;
        $data = OrderItem::with('order')->where('p_id',$id)->whereHas('order', function ($q) use ($req) {
            $q->where('status', '!=' ,'5');
        });
        $product = Product::find($id);
        if($req->date){
            $data = $data->where('date',$req->date);
        }
        $data=$data->get();
        foreach($data as $d){
            if($req->from < $d->to){
                $stock = $d->qty + $stock;       
            }
        }
        $result = $product->qty - $stock;
        if(count($data) == 0){
            $result = $product->qty;
        }
        return $result;
    }
    public static function deleteProduct($id){
        $cart_item = CartItem::where('p_id',$id)->delete();
        $order_item = OrderItem::where('p_id',$id)->delete();
        $product = Product::where('id',$id)->delete();
    }
    public static function deleteCategory($id){
        Category::find($id)->delete();
        $products = Product::where('cat_id',$id)->get();
        foreach($products as $product){
            CartItem::where('p_id',$product->id)->delete();
            OrderItem::where('p_id',$product->id)->delete();
        }
        Product::where('cat_id',$id)->delete();
    }
    public static function noOfViews($id){
        $view = View::where('ads_id',$id)->sum('no_of_view');
        return $view;
    }

    public static function getSale($product_id)
    {
        $sale = Sale::where('product_id',$product_id)->first();
        if($sale){
        $start = Carbon::createFromFormat('m-d-Y H:i', $sale->start_date);
        $end = Carbon::createFromFormat('m-d-Y H:i', $sale->end_date);
        $now = Carbon::createFromFormat('m-d-Y H:i', date("m-d-Y H:i"));
        if($now->gte($start) && $end->gte($now)){
            $sale->status = 'active';
        }
        else{
        if($sale){
            $sale->status = 'unactive';
        }
        }
        }
        return $sale;
    }

    public static function deleteAddon($id)
    {
        Addon::where('id',$id)->delete();
        CartAddon::where('addon_id',$id)->delete();
        OrderAddon::where('addon_id',$id)->delete();
    }

    public static function getCartAddon($id,$ip)
    {
        $data = CartAddon::where('ip',$ip)->where('addon_id',$id)->first();
        return $data;
    }
}
