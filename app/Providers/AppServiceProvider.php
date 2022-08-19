<?php

namespace App\Providers;

use App\Ad;
use App\Order;
use App\Common;
use App\Coupon;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $req = new Request;
            $service = Common::getProductsOrServices(2,['1']);
            $order = Order::where('is_seen','0')->count();
            $ads = Ad::where('status','0')->count();
            
            // $coupon = Coupon::where('code',session()->get('coupon'))->where('expiry','>',date("m-d-Y H:i"))->first();
            // $subtotal = Common::calculation($req);
            // if($coupon){
            //     if($subtotal['subtotal'] >= $coupon->min_spend && $coupon->max_spend <= $subtotal['subtotal']+$coupon->amount){
            //         session()->put('discount',$coupon->amount);
            //         session()->put('coupon',$coupon->code);
            //     }
            //     else{
            //         session()->put('discount',0);
            //     }
            // }
            // else{
            //     session()->put('discount',0);
            // }
            $contact_setting = Section::where('section','setting')->first();

            $view->with(['v_service'=>$service,'v_order'=>$order,'v_ads'=>$ads,'contact_setting'=>$contact_setting]);
        });
    }
}
