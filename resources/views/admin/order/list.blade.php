@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>List Order</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">List Order</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">


  </div>
  <div class="row">
    <!-- Zero Configuration  Starts-->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="display" id="basic-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <!-- <th>SubTotal</th>
                  <th>Discount</th> -->
                  <th>Total</th>
                  <th>Status</th>
                  <th>Order At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr>
                  <td class="id position-relative"> @if($order->is_seen == 0) <i class="fa  text-green position-absolute" style="top:-40px;left:5px"><span class="f-70">.</span></i> @endif {{$order->id}}</td>
                  <td class="description">{{$order->firstname." ".$order->lastname}}</td>
                  <!-- <td class="description">$ {{$order->subtotal}}</td>
                  <td class="description">$ {{$order->discount}}</td> -->
                  <td class="description">$ {{$order->grand_total}}</td>
                  <td class="description">{{$order->deliverystatus->title}}</td>
                  <td class="description">{{$order->created_at}}</td>
                  <td class="d-flex">
                    <a href="{{url('admin/order/edit/'.$order->id)}}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                    <form id="delete-form" action="{{url('admin/order/destroy/'.$order->id)}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                  </td>
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