@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit Coupon</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Coupon</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <form method="POST" action="{{url('admin/coupon/update/'.$coupon->id)}}" enctype="multipart/form-data">
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Coupon</label>
              <input class="form-control" type="text" readonly name="code" value="{{$coupon->code}}" >
            </div>
            <div class="mb-3">
              <label class="col-form-label">Amount</label>
              <input class="form-control" type="number" name="amount" value="{{$coupon->amount}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Expiry</label>
              <input class="form-control date" type="text" name="expiry" value="{{$coupon->expiry}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Min Spend</label>
              <input class="form-control" type="number" name="min_spend" value="{{$coupon->min_spend}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Max Spend</label>
              <input class="form-control" type="number" name="max_spend" value="{{$coupon->max_spend}}" required>
            </div>
            <!-- <div class="mb-3">
              <label class="col-form-label">Limit Per User</label>
              <input class="form-control" type="number" name="limit_per_user" value="{{$coupon->limit_per_user}}" required>
            </div> -->
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>

        </div>
    </div>
    </form>


    </div>
    <div class="row">

    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
@endsection