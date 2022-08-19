@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>First Section</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Contact Us Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{url('admin/contact-first/update/'.$firstsetting->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <div class="form-group">
                <div id="profile-container">
                  <img class="" id="profileImage" src="{{asset('front/img/'.json_decode($firstsection->content)->image)}}" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload" type="file" name="image1" placeholder="Photo" capture="" value="">
              </div>
            </div>
            <div class="mb-3">
              <input class="form-control" type="hidden" name="section_id" value="{{$firstsection->id}}" required>
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="{{json_decode($firstsetting->content)->heading}}" required>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>

          </div>
        </div>
    </form>


  </div>

  <div class="container-fluid">
  <h3 class="mt-3 mb-3">Second Section</h3>

    <form method="POST" action="{{url('admin/contact-second/update/'.$secondsetting->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <input class="form-control" type="hidden" name="section_id" value="{{$secondsection->id}}" required>
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="{{json_decode($secondsetting->content)->heading}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control" name="description" id="" cols="30" rows="3" required>{{json_decode($secondsection->content)->description}}</textarea>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>

          </div>
        </div>
    </form>


  </div>

  <div class="container-fluid">
  <h3 class="mt-3 mb-3">Setting Section</h3>
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <form method="POST" action="{{url('admin/contact-second/update/setting/'.$settingsection->id)}}" enctype="multipart/form-data">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Email</label>
              <input class="form-control" type="email" name="email" value="{{json_decode($settingsection->content)->email}}">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Phone</label>
              <input class="form-control" type="text" name="phone" value="{{json_decode($settingsection->content)->phone}}">
            </div>
            <div class="mb-3">
              <label class="col-form-label">City</label>
              <input class="form-control" type="text" name="city" value="{{json_decode($settingsection->content)->city}}">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Address</label>
              <input class="form-control" type="text" name="address" value="{{json_decode($settingsection->content)->address}}">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Available</label>
              <input class="form-control" type="text" name="available" value="{{json_decode($settingsection->content)->available}}">
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  @endsection