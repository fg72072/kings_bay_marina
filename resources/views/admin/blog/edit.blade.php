@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit Blog</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Blog</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <form method="POST" action="{{url('admin/blog/update/'.$blog->id)}}" enctype="multipart/form-data">
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            @csrf
            <div class="mb-3">
            <div class="form-group">
                <div id="profile-container">
                    <img class="" id="profileImage" src="{{asset('front/img/'.$blog->img)}}" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                </div>
                <br>
                <input id="imageUpload" type="file" name="img" placeholder="Photo" capture="" value="">
            </div>
             </div>
            <div class="mb-3">
              <label class="col-form-label">Title</label>
              <input class="form-control" type="text" name="title" value="{{$blog->title}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Short Intro</label>
              <textarea class="form-control" name="short_intro" id="" cols="30" rows="3" required>{{$blog->short_intro}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control ckeditor" name="description" id="" cols="30" rows="5" required>{!! $blog->description !!}</textarea>
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