@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Setting</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <div class="row second-chart-list third-news-update">
          <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
            <form method="POST" action="{{url('admin/setting/update/'.$section->id)}}" enctype="multipart/form-data">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Email</label>
              <input class="form-control" type="email" name="email" value="{{json_decode($section->content)->email}}" >
            </div>
            <div class="mb-3">
              <label class="col-form-label">Phone</label>
              <input class="form-control" type="text" name="phone" value="{{json_decode($section->content)->phone}}" >
            </div>
            <div class="mb-3">
              <label class="col-form-label">Location</label>
              <input class="form-control" type="text" name="location" value="{{json_decode($section->content)->location}}" >
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>
          </div>
        </form>
        </div>
  </div>
</div>
</div>
@endsection