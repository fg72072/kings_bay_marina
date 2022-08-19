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
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>

        <h3 class="mb-3">Checkout</h3>


        <div class="row">
            <div class="col-lg-8">

                <div class="checkout">

                    <h5 class="mb-4">Billing Details</h5>

                    <form class="custom-form" id="order_form" action="{{url('order')}}" method="POST">
                        @csrf
                        <div class="row">
                            <span class="checkout_url d-none">{{url('placeorder')}}</span>
                            <div class="form-group col-lg-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname">
                                <span class="text-danger firstname_error"></span>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                                <span class="text-danger lastname_error"></span>
                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                                <span class="text-danger address_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="appartment">Apartmen, Suit etc</label>
                                <input type="text" class="form-control" id="appartment" name="appartment">
                                <span class="text-danger appartment_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country">
                                <span class="text-danger country_error"></span>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city">
                                <span class="text-danger city_error"></span>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="postal">Postal Code</label>
                                <input type="text" class="form-control" id="postal" name="postal_code">
                                <span class="text-danger postal_code_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                                <span class="text-danger phone_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                <span class="text-danger email_error"></span>
                            </div>

                            <h5 class="my-4">Additional information</h5>
                            <div class="form-group">
                                <label for="order-notes">Order Notes (Optional)</label>
                                <textarea name="order_note" id="order-notes" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label >Payment Method</label>
                                <div class="payment-methods">
                                <div>
                                <input type="radio" value="innovators" id="innovators" checked name="payment_method">
                                <label for="innovators">Payment Innovators</label>
                                </div>
                                <div>
                                <input type="radio" value="NowPayments" id="NowPayments" name="payment_method">
                                <label for="NowPayments">NowPayments</label>
                                </div>
                                </div>
                                <span class="text-danger payment_method_error"></span>
                            </div>

                        </div>

                        <div class="order-summary">

                            <h5 class="my-4">Your Order Summary</h5>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($cart_items as $cart)
                                    <tr>
                                        <td>
                                            <p>{{$cart->product->title}} &nbsp; <span>x{{$cart->qty}}</span></p>
                                            <!-- @if($cart->date)
                                        <p><span class="f-bold">Date :</span> {{$cart->date}}</p>
                                        @endif -->
                                            @if($cart->from)
                                            <p><span class="f-bold">Check in :</span> {{$cart->from}}</p>
                                            @endif
                                            @if($cart->to)
                                            <p><span class="f-bold">Check out :</span> {{$cart->to}}</p>
                                            @endif
                                            @if(count($cart->cart_addon) > 0)
                                            <h4 class="mt-1">Addons</h4>
                                            @foreach($cart->cart_addon as $addon)
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
                                        </td>

                                        <td>$ {{$cart->total}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>$ {{$calculation['subtotal']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>$ {{$calculation['discount']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>$ {{$calculation['grandtotal']}}</td>
                                    </tr>

                                </tbody>

                            </table>

                        </div>

                        <p class="my-3">Your personal data will be used to process your order, support your experience throughout this website,
                            and for other purposes described in our <a href="#">privacy policy.</a></p>

                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Place Order" class="custom-btn primary-btn">
                        </div>

                    </form>







                </div>


            </div>

            <div class="col-lg-4">

                <div class="order-summary-box">

                    @foreach($cart_items as $cart)
                    <div class="items">
                        <h5 class="mb-4">{{$cart->product->title}}</h5>

                        <ul>
                            <li>
                                <p><span class="f-bold">Price : </span>${{$cart->price}}</p>
                            </li>
                            <!-- @if($cart->date)
                <li>
                    <p><span class="f-bold">Date : </span>{{$cart->date}}</p>
                </li>
                @endif -->
                            @if($cart->from)
                            <li>
                                <p><span class="f-bold">Check in : </span>{{$cart->from}}</p>
                            </li>
                            @endif
                            @if($cart->to)
                            <li>
                                <p><span class="f-bold">Check in : </span>{{$cart->to}}</p>
                            </li>
                            @endif


                        </ul>

                    </div>
                    @endforeach

                    <h6 class="mb-4">Total: ${{$calculation['subtotal']}}</h6>


                </div>

            </div>

        </div>




    </div>

</section>
@endsection