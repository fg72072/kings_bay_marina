<?php

namespace App\Http\Controllers;

use App\Addon;
use App\Common;
use App\Coupon;
use App\Product;
use App\CartItem;
use App\CartAddon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $req)
    {

        Common::checkSpend($req);
        $data['cart_items'] = CartItem::with('product')->where('ip', $req->ip())->get();
        foreach ($data['cart_items'] as $cart) {
            $cart->cart_addon = CartAddon::with('addon')->where('cart_item_id', $cart->id)->get();
            $category = Common::getCategroyParent($cart->product->cat_id);
            if ($category == 1) {
                $cart->product->stock = Common::stock($cart->p_id);
            }
            if ($category == 2) {
                $cart->product->stock = '';
            }
        }
        $data['calculation'] = Common::calculation($req);
        return view('cart', $data);
    }
    public function addToCart($id, Request $req)
    {
        $weekend = 0;
        $weekend_amount = 0;
        Common::checkSpend($req);
        $to = \Carbon\Carbon::parse($req->date);
        $discount = 0;
        $product = Product::with('category')->find($id);
        if ($product->category->parent == 2) {
            $validate = Request()->validate([
                'date' => 'required',
            ]);
        }
        $product->sales = Common::getSale($id);
        if ($product->sales && $product->sales->status == 'active') {
            $product->price = $product->sales->sale_price;
            $discount = $product->sales->discount;
        }
        if ($product->category->parent == 1) {
            $product->stock = Common::stock($id);
        }
        if ($product->category->parent == 2) {
            $product->stock = Common::serviceStock($product->id, $req);
        }
        $cart_item = CartItem::where('ip', $req->ip())->where('p_id', $id)->first();
        if ($cart_item) {
            if ($req->qty) {
                $quantity =  $req->qty;
                if ($quantity <=  $product->stock) {
                    if ($req->date) {
                        $cart_item->date = $req->date;
                    }
                    if ($req->no_of) {
                        $cart_item->date = $req->date;
                        if ($product->category->parent == 2) {
                            $to = \Carbon\Carbon::parse($req->date);
                            if ($product->form_type == 0) {
                                $no_of = $req->no_of;
                                $price = $product->price * $req->no_of;
                                $to = \Carbon\Carbon::parse($req->date)->addHour($no_of);
                                $date = \Carbon\Carbon::parse($req->date);
                                $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                                    return $date->isWeekend();
                                }, $to);
                            } elseif ($product->form_type == 1) {
                                $no_of = $req->no_of;
                                $price = $product->price * $req->no_of;
                                $to = \Carbon\Carbon::parse($req->date)->addDay($no_of);
                                $date = \Carbon\Carbon::parse($req->date);
                                $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                                    return $date->isWeekend();
                                }, $to);
                            } elseif ($product->form_type == 2) {
                                $no_of = $req->no_of * 30;
                                $price = $product->price * $req->no_of;
                                $to = \Carbon\Carbon::parse($req->date)->addDay($no_of);
                                $date = \Carbon\Carbon::parse($req->date);
                                $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                                    return $date->isWeekend();
                                }, $to);
                            } elseif ($product->form_type == 3) {
                                $no_of = $req->no_of * 360;
                                $price = $product->price * $req->no_of;
                                $to = \Carbon\Carbon::parse($req->date)->addDay($no_of);
                                $date = \Carbon\Carbon::parse($req->date);
                                $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                                    return $date->isWeekend();
                                }, $to);
                            }
                            if ($req->date) {
                                $weekend_amount = $product->weekend_price * $weekend;
                            }
                            if ($product->weekend_type == 0) {
                                $price += $weekend_amount;
                            }
                            if ($product->weekend_type == 1) {
                                $price -= $weekend_amount;
                            }
                            $cart_item->price = $price;
                        }
                        $delete_addon = CartAddon::where('cart_item_id', $cart_item->id)->delete();
                        if ($req->addon) {
                            $count = count($req->addon) - 1;
                            for ($i = 0; $i <= $count; $i++) {
                                $addon_list = Addon::where('id', $req->addon[$i])->where('product_id', $id)->first();
                                if ($addon_list) {
                                    $addon = new CartAddon;
                                    $addon->ip = $req->ip();
                                    $addon->cart_item_id = $cart_item->id;
                                    $addon->addon_id = $addon_list->id;
                                    $addon->price = $req->addon_price[$i];
                                    $addon->night_or_guest =  $req->addon_qty[$i];
                                    $addon->total = $req->addon_qty[$i] * $req->addon_price[$i];
                                    $addon->type = $addon_list->type;
                                    $addon->save();
                                }
                            }
                        }
                    }
                    if ($req->date) {
                        $cart_item->to = $to;
                    }
                    if ($req->no_of) {
                        $cart_item->no_of_count = $req->no_of;
                    }
                    $cart_item->qty = $req->qty;
                    // if ($product->weekend_type == 0) {
                    //     $cart_item->total = ($cart_item->price * $req->qty) + $weekend_amount;
                    // }
                    // if ($product->weekend_type == 1) {
                    //     $cart_item->total = ($cart_item->price * $req->qty) - $weekend_amount;
                    // } else {
                    //     $cart_item->total = $cart_item->price * $req->qty;
                    // }
                    $cart_item->total = $cart_item->price * $req->qty;
                    $cart_item->save();
                } else {
                    return redirect()->back()->with('msg', 'Out of Stock');
                }
            } else {
                $quantity = $cart_item->qty + 1;
                if ($quantity <= $product->stock) {
                    $cart_item->qty = $cart_item->qty + 1;
                    $cart_item->total = $cart_item->price * $cart_item->qty + 1;
                    $cart_item->save();
                } else {
                    return redirect()->back()->with('msg', 'Out of Stock');
                }
            }
        } else {
            if ($req->qty && $req->qty <=  $product->stock || !$req->qty && 1 <=  $product->stock) {
                $cart_item = new CartItem;
                $cart_item->ip = $req->ip();
                $cart_item->p_id = $product->id;
                if ($product->category->parent == 2) {
                    if ($product->form_type == 0) {
                        $no_of = $req->no_of;
                        $price = $product->price * $req->no_of;
                        $to = \Carbon\Carbon::parse($req->date)->addHour($no_of);
                        $date = \Carbon\Carbon::parse($req->date);
                        $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                            return $date->isWeekend();
                        }, $to);
                    } elseif ($product->form_type == 1) {
                        $no_of = $req->no_of;
                        $price = $product->price * $req->no_of;
                        $to = \Carbon\Carbon::parse($req->date)->addDay($no_of);
                        $date = \Carbon\Carbon::parse($req->date);
                        $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                            return $date->isWeekend();
                        }, $to);
                    } elseif ($product->form_type == 2) {
                        $no_of = $req->no_of * 30;
                        $price = $product->price * $req->no_of;
                        $to = \Carbon\Carbon::parse($req->date)->addDay($no_of);
                        $date = \Carbon\Carbon::parse($req->date);
                        $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                            return $date->isWeekend();
                        }, $to);
                    } elseif ($product->form_type == 3) {
                        $no_of = $req->no_of * 360;
                        $price = $product->price * $req->no_of;
                        $to = \Carbon\Carbon::parse($req->date)->addDay($no_of);
                        $date = \Carbon\Carbon::parse($req->date);
                        $weekend = $date->diffInDaysFiltered(function (Carbon $date) {
                            return $date->isWeekend();
                        }, $to);
                    }
                } else {
                    $price = $product->price;
                }

                if (!$product->form_type) {
                    $price = $product->price;
                }
                if ($req->date) {
                    $weekend_amount = $product->weekend_price * $weekend;
                }
                if ($product->weekend_type == 0) {
                    $price += $weekend_amount;
                }
                if ($product->weekend_type == 1) {
                    $price -= $weekend_amount;
                }
                $cart_item->price = $price;
                $cart_item->discount = $discount;
                if ($req->qty) {
                    $cart_item->qty = $req->qty;
                    $cart_item->total = $price * $req->qty;
                } else {
                    $cart_item->qty = 1;
                    $cart_item->total = $product->price * 1;
                }
                if ($req->no_of) {
                    $cart_item->no_of_count = $req->no_of;
                }
                if ($req->date) {
                    $cart_item->date = $req->date;
                    $cart_item->from = $req->date;
                    $cart_item->to = $to;
                }
                if ($product->category->parent == 1) {
                    $cart_item->type = 'product';
                } else {
                    $cart_item->type = 'service';
                }
                $cart_item->form_type = $product->form_type;
                $cart_item->save();
                if ($req->addon) {
                    $count = count($req->addon) - 1;
                    for ($i = 0; $i <= $count; $i++) {
                        $addon_list = Addon::where('id', $req->addon[$i])->where('product_id', $id)->first();
                        if ($addon_list) {
                            $addon = new CartAddon;
                            $addon->ip = $req->ip();
                            $addon->cart_item_id = $cart_item->id;
                            $addon->addon_id = $addon_list->id;
                            $addon->price = $req->addon_price[$i];
                            $addon->night_or_guest =  $req->addon_qty[$i];
                            $addon->total = $req->addon_qty[$i] * $req->addon_price[$i];
                            $addon->type = $addon_list->type;
                            $addon->save();
                        }
                    }
                }
            } else {
                return redirect()->back()->with('msg', 'Out of Stock');
            }
        }
        if ($req->buy) {
            Common::cartTotal($req);
            return redirect('checkout');
        } else {
            Common::cartTotal($req);
            return back()->with('success', 'Product has been add to cart succesfully');
        }
    }
    public function update(Request $req)
    {
        Common::checkSpend($req);
        $count = count($req->qty) - 1;
        $arry = [];
        for ($i = 0; $i <= $count; $i++) {
            $cart_item = CartItem::with('product')->where('ip', $req->ip())->where('p_id', $req->id[$i])->first();
            $parent = Common::getCategroyParent($cart_item->product->cat_id);
            if ($parent == 1) {
                $cart_item->stock = Common::stock($cart_item->p_id);
            }
            if ($parent == 2) {
                $cart_item->stock = Common::serviceStock($cart_item->p_id, $cart_item);
            }
            if ($req->qty[$i] <= $cart_item->stock) {
                unset($cart_item->stock);
                $cart_item->qty = $req->qty[$i];
                $cart_item->total = $cart_item->price * $req->qty[$i];
                $cart_item->save();
            } else {
                array_push($arry, $cart_item->p_id);
            }
        }
        if ($req->apply && $req->code) {
            $coupon = Coupon::where('code', $req->code)->where('expiry', '>', date("m-d-Y H:i"))->first();
            $subtotal = Common::calculation($req);
            if ($coupon) {
                if ($subtotal['subtotal'] >= $coupon->min_spend && $coupon->max_spend <= $subtotal['subtotal']) {
                    Common::applyCoupon($req, $coupon->code, $coupon->amount);
                } else {
                    return back()->with('coupon_error', 'Minimum spend $' . $coupon->min_spend . ' and Maximum spend $' . $coupon->max_spend);
                }
            } else {
                return back()->with('coupon_error', 'Invalid coupon or expired');
            }
        }
        Common::cartTotal($req);
        return redirect()->back()->with('out_of_stock_item', $arry);
    }
    public function remove(Request $req, $id)
    {
        $cart = CartItem::where('ip', $req->ip())->where('p_id', $id)->first();
        $cart->delete();
        $delete_addon = CartAddon::where('cart_item_id', $cart->id)->delete();
        return redirect()->back()->with('msg', 'Item has been successfully removed.');
    }
}
