@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>List Coupon</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">List Coupon</li>
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
                    <th>Coupon</th>
                    <th>Amount</th>
                    <th>Min Spend</th>
                    <th>Max Spend</th>
                    <!-- <th>Limit Per User</th> -->
                    <th>Expiry</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach($coupons as $coupon)
                      <tr>
                            <td class="id">{{$coupon->id}}</td>
                            <td class="description">{{$coupon->code}}</td>
                            <td class="description">${{$coupon->amount}}</td>
                            <td class="description">${{$coupon->min_spend}}</td>
                            <td class="description">${{$coupon->max_spend}}</td>
                            <!-- <td class="description">{{$coupon->limit_per_user}}</td> -->
                            <td class="description">{{$coupon->expiry}}</td>
                            <td class="d-flex">
                            <a href="{{url('admin/coupon/edit/'.$coupon->id)}}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/coupon/destroy/'.$coupon->id)}}" method="post">
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