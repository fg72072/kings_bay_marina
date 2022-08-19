@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit Order</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Order</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{url('admin/order/update/'.$order->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label class="col-form-label">First Name</label>
              <input class="form-control" type="text" name="firstname" value="{{$order->firstname}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Last Name</label>
              <input class="form-control" type="text" name="lastname" value="{{$order->lastname}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Email</label>
              <input class="form-control" type="email" name="email" value="{{$order->email}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Phone</label>
              <input class="form-control" type="text" name="phone" value="{{$order->phone}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Appartment</label>
              <input class="form-control" type="text" name="appartment" value="{{$order->appartment}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Status</label>
              <select class="form-control" name="status">
                @foreach($statuses as $status)
                <option value="{{$status->id}}" @if($status->id == $order->status) selected @endif>{{$status->title}}</option>
                @endforeach
              </select>
            </div>

          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            <div class="mb-3">
              <label class="col-form-label">Country</label>
              <input class="form-control" type="text" name="country" value="{{$order->country}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">City</label>
              <input class="form-control" type="text" name="city" value="{{$order->city}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Postal Code</label>
              <input class="form-control" type="text" name="postal_code" value="{{$order->postal_code}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Address</label>
              <input class="form-control" type="text" name="address" value="{{$order->address}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Delivery Note</label>
              <textarea class="form-control" name="note" id="" cols="30" rows="5" >{{$order->order_note}}</textarea>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>
          </div>
        </div>
    </form>


  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">

          <h5 class="d-flex justify-content-between">
          <span>Order ID : {{$order->id}}</span>
          <span>SubTotal : ${{$order->subtotal}}</span>
          <span>Discount : ${{$order->discount}}</span>
          <span>GrandTotal : ${{$order->grand_total}}</span>
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Img</th>
                    <th style="width: 230px;">Title</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantiy</th>
                    <th>Discount</th>
                    <th>Total</th>
                    <th>Check in</th>
                    <th>Check out</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach($order_items as $product)
                      <tr>
                            <td class="id">{{$product->product->id}}</td>
                            <td class="heading"><img src="{{asset('front/img/'.$product->product->img)}}" width="100"></td>
                            <td class="description">{{$product->product->title}}
                            @if(count($product->cart_addon) > 0)
                                            <h4 class="mt-1">Addons</h4>
                                            @foreach($product->cart_addon as $addon)
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
                            <td class="description">{{$product->type}}</td>
                            <td class="description">${{$product->price}}</td>
                            <td class="description">{{$product->qty}}</td>
                            <td class="description">${{$product->discount}}</td>
                            <td class="description">${{$product->total}}</td>
                            <td>{{$product->from}}</td>
                            <td>{{$product->to}}</td>
                          </tr>
                        @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection