@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit Ads</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Ads</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <form method="POST" action="{{url('admin/ads/update/'.$ads->id)}}" enctype="multipart/form-data">
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            @csrf
            <div class="mb-3">
            <div class="form-group">
                <div id="profile-container">
                    <img class="" id="profileImage" src="{{asset('front/img/'.$ads->img)}}" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload" type="file" name="img" placeholder="Photo" capture="" value="">
            </div>
             </div>
            <div class="mb-3">
              <label class="col-form-label">Title</label>
              <input class="form-control" type="text" name="title" value="{{$ads->title}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Video</label>
              <input class="form-control" type="text" name="video" value="{{$ads->video}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Price Type</label>
              <select class="form-control" name="price_type">
                <option value="1" @if($ads->price_type == 1) selected @endif>Fixed</option>
                <option value="2" @if($ads->price_type == 2) selected @endif>Negotiable</option>
                <option value="3" @if($ads->price_type == 3) selected @endif>On Call</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Price</label>
              <input class="form-control" type="number" name="price" value="{{$ads->price}}" required>
            </div>
       
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
          <div class="mb-3">
              <label class="col-form-label">Type</label>
              <select class="form-control" name="type">
                <option value="1" @if($ads->type == 1) selected @endif>Rent</option>
                <option value="2" @if($ads->type == 2) selected @endif>Sell</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Status</label>
              <select class="form-control" name="status">
                <option value="0" @if($ads->status == 0) selected @endif>Pending</option>
                <option value="1" @if($ads->status == 1) selected @endif>Live</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control ckeditor" name="description" id="" cols="30" rows="5" required>{!! $ads->description !!}</textarea>
            </div>
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