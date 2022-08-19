@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<script src="https://pipay.io/js/pi.js"></script>
<script type="text/javascript">
PiCallbackTransaction = function(response) {
console.log('transaction',response.TransactionResult);

console.log(response.PTK);
console.log(response.AuthCode);
console.log('message',response.ResponseMsg);
console.log(response.ApprovedAmount);
console.log(response.Token);
console.log(response.CardType);
console.log(response.AccountNum);
console.log(response.ExpDate);
if(response.TransactionResult == 'true')
{
    window.location.href = "{{url('placeorder')}}";
}
}
doCreatePiForm({
"method":"creditsale",
"account":"1629375475",
"sn":"53612943",
"omni":"no",
"paysource":"PHONE",
"amount":"2.25",
"ticketid":"109",
"userid":"John",
"json":"no",
"firstname":"Forodo",
"lastname":"Baggins",
"address":"123 Main Street",
"zip":"98029",
"autorun":"no"
});
</script>
<section class="main-section">



    <div class="container">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
        </nav>

        <h3 class="mb-3">Payment</h3>


        <div class="row">
            <div class="col-lg-8">

                <div class="checkout">
                <div id="formPI" ></div>

                </div>


            </div>

            <div class="col-lg-4">
            <div class="order-summary order-summary-box">

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

            </div>

        </div>




    </div>

</section>
@endsection