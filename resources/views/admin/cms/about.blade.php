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
            <li class="breadcrumb-item active">About Us Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{url('admin/about-first/update/'.$firstsetting->id)}}" enctype="multipart/form-data">
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

    <form method="POST" action="{{url('admin/about-second/update/'.$secondsetting->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3 d-flex">
              <div class="form-group">
                <div id="profile-container">
                  <img class="" id="profileImage1" src="{{asset('front/img/'.json_decode($secondsection->content)->image1)}}" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload1" type="file" name="image1" placeholder="Photo" capture="" value="">
              </div>
              <div class="form-group">
                <div id="profile-container">
                  <img class="" id="profileImage2" src="{{asset('front/img/'.json_decode($secondsection->content)->image2)}}" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload2" type="file" name="image2" placeholder="Photo" capture="" value="">
              </div>
            </div>
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

  @endsection