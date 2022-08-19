<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta class="url" name="url" content="{{url('')}}">
    <meta  name="Fazal Ghani" content="FullStack Developer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/bootstrap/css/bootstrap.min.css')}}">
</head>

<body>
<div class="order-summary">
<h5 class="my-4">Delivery Information</h5>
<p><b>FirstName : </b>{{$order->firstname}}</p>
<p><b>LastName : </b>{{$order->lastname}}</p>
<p><b>Phone : </b>{{$order->phone}}</p>
<p><b>Email : </b>{{$order->email}}</p>
<p><b>Country : </b>{{$order->country}}</p>
<p><b>City : </b>{{$order->city}}</p>
<p><b>Postal Code : </b>{{$order->postal_code}}</p>
<p><b>Appartment : </b>{{$order->appartment}}</p>
<p><b>Address : </b>{{$order->address}}</p>
<p><b>Delivery Note : </b>{{$order->order_note}}</p>
<h5 class="my-4">Order Summary</h5>

<table class="table" style="    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #212529;
    --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
    --bs-table-active-color: #212529;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #212529;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    vertical-align: top;
    border-color: #dee2e6;">
    <thead style="vertical-align: bottom;border-color: inherit;
    border-style: solid;
    border-width: 0;">
        <tr style="
    border-color: inherit;
    border-style: solid;
    border-width: 0;
">
            <th style="text-align:left;">Product</th>
            <th style="text-align:left;">Subtotal</th>
        </tr>
    </thead>

    <tbody>
    @foreach($order_items as $cart)
        <tr style="
    border-color: inherit;
    border-style: solid;
    border-width: 0;
">
            <td style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">
                <p>{{$cart->product->title}} &nbsp; <span>x{{$cart->qty}}</span></p>
                @if($cart->date)
                <p><span class="f-bold">Date :</span> {{$cart->date}}</p>
                @endif
                @if($cart->from)
                <p><span class="f-bold">Check in :</span> {{$cart->from}}</p>
                @endif
                @if($cart->to)
                <p><span class="f-bold">Check out :</span> {{$cart->to}}</p>
                @endif
                <!-- @if($cart->cart_addon)
                <h4 class="mt-1">Addons</h4>
                @foreach($cart->cart_addon as $addon)
                <div class="addon-flex">
                <span>{{$addon->addon->title}}</span>
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
                @endif -->
            </td>

            <td style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">$ {{$cart->total}}</td>
        </tr>
    @endforeach
        <tr style="
    border-color: inherit;
    border-style: solid;
    border-width: 0;
">
            <th style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">Subtotal</th>
            <td style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">$ {{$order->subtotal}}</td>
        </tr>
        <tr style="
    border-color: inherit;
    border-style: solid;
    border-width: 0;
">
            <th style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">Discount</th>
            <td style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">$ {{$order->discount}}</td>
        </tr>
        <tr style="
    border-color: inherit;
    border-style: solid;
    border-width: 0;
">
            <th style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">Total</th>
            <td style="padding: 0.5rem 0.5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);">$ {{$order->grand_total}}</td>
        </tr>

    </tbody>

</table>

</div>

</body>

</html>

