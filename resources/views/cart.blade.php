@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="main-section">



    <div class="container">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>

        <h3 class="mb-3">Cart</h3>
        <div>
            @if(session('msg'))
            <span>{{session('msg')}}</span>
            @endif
        </div>
        <form action="{{url('update-cart')}}" method="POST">
            @csrf
            @if(count($cart_items) >=1)
            <div class="row">
                <div class="col-lg-8">

                    <div class="table-responsive">
                        <table class="cart-table table">

                            <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="2">Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($cart_items as $cart_item)
                                <input name="id[]" value="{{$cart_item->p_id}}" type="hidden" />
                                <tr>
                                    <td><a href="{{url('cart-remove/'.$cart_item->p_id)}}"><i class="fa-solid fa-xmark"></i></a></td>
                                    <td style="width: 100px;">
                                        <a href="{{url('product/'.$cart_item->p_id)}}">
                                            <img src="{{asset('front/img/'.$cart_item->product->img)}}">
                                        </a>
                                    </td>

                                    <td class="product-td">

                                        <span>
                                            <a>
                                                <p>{{$cart_item->product->title}}</p>
                                            </a>
                                            <!-- @if($cart_item->date)
                                            <p><span class="f-bold">Date : </span> {{$cart_item->date}}</p>
                                            @endif -->
                                            @if($cart_item->from)
                                            <p><span class="f-bold">Check in : </span> {{$cart_item->from}}</p>
                                            @endif
                                            @if($cart_item->to)
                                            <p><span class="f-bold">Check out : </span> {{$cart_item->to}}</p>
                                            @endif
                                            @if(count($cart_item->cart_addon) > 0)
                                            <h4 class="mt-1">Addons</h4>
                                            @foreach($cart_item->cart_addon as $addon)
                                            <div class="addon-flex">
                                            <span>{{$addon->addon->title}}</span>
                                            <br>
                                            <span>x{{$addon->night_or_guest}}</span>
                                            <br>
                                            <div class="text-start">
                                            <div class="text-center">
                                            <span>${{$addon->total}}</span>
                                            </div>
                                            <span>
                                            @if($addon->type == 0)
                                            per night
                                            @elseif($addon->type == 1)
                                            per guest
                                            @elseif($addon->type == 2)
                                            single fee
                                            @endif
                                            </span>
                                            </div>
                                            <br>
                                            </div>
                                            @endforeach
                                            @endif
                                        </span>

                                    </td>
                                    <td>$ {{$cart_item->price}}</td>
                                    <td>
                                        <input class="my-cart-qty" type="number" name="qty[]" style="width: 4em;" value="{{$cart_item->qty}}" data-stock="{{$cart_item->product->stock}}" min="{{$cart_item->product->min_guest}}" max="{{$cart_item->product->max_guest}}">
                                        <div class="cart-addon-error-message text-danger">

                                        </div>
                                        @if(session('out_of_stock_item') && in_array($cart_item->p_id,session('out_of_stock_item')))
                                        <br />
                              
                                        @if($cart_item->type == 'service')
                                        <span class="text-danger">Out of Stock</span>
                                        @else
                                        <span class="text-danger">Out of Stock</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td>$ {{$cart_item->total}}</td>
                                </tr>
                                @empty

                                @endforelse

                            </tbody>

                        </table>
                    </div>

                    <div class="cart-group-flex">

                        <a href="#" class="m-t-resp"><i class="fa-solid fa-angle-left"></i> Continue Shopping</a>
                        <div class="m-t-resp">
                            <div class="coupon-section">
                                <input class="form-control" placeholder="Coupon" name="code" />
                                <button type="submit" name="apply" value="apply" class="custom-btn primary-btn">Apply</button>
                            </div>
                            @if(session('coupon_error'))
                            <span class="text-danger">{{session('coupon_error')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="m-t-resp custom-btn primary-btn"><i class="fa-solid fa-arrows-rotate"></i> Update Cart</button>

                    </div>


                </div>

                <div class="col-lg-4">

                    <div class="cart-box">

                        <h4>Cart totals</h4>

                        <div class="cart-total">
                            <span>
                                <p>Subtotal:</p>
                                <p>${{$calculation['subtotal']}}</p>
                            </span>
                            <span>
                                <p>Discount:</p>
                                <p>${{$calculation['discount']}}</p>
                            </span>
                            <!-- <span>
                                <p>Tax:</p>
                                <p>$60.00</p>
                            </span> -->
                            <span>
                                <p>Grandtotal:</p>
                                <p>${{$calculation['grandtotal']}}</p>
                            </span>

                            <a href="{{url('checkout')}}" class="custom-btn primary-btn d-flex justify-content-center my-3">
                                Proceed to Checkout
                            </a>

                        </div>

                    </div>

                </div>

            </div>
            @else
            <div class="mt-5 text-center">
                <h3>Empty Cart</h3>
                <div class="mt-5"><a href="{{url('products')}}" class="custom-btn primary-btn">Continue Shopping</a></div>
            </div>
            @endif
        </form>





    </div>

</section>
@endsection