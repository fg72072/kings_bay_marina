@extends('admin.layouts.app')
@section('section')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Home Section</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
                <div class="card-body">
                    <form method="POST" action="{{url('admin/home-update/'.$setting->id)}}" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-3">
                        <div class="form-group">
                            <div id="profile-container">
                                <img class="" id="profileImage" src="{{asset('front/images/'.json_decode($setting->content)->image)}}" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                            </div>
                            <br>
                            <input id="imageUpload" type="file" name="image" placeholder="Photo" capture="" value="" style="display: none">
                        </div>
                        </div>
                    <div class="mb-3">
                        <label class="col-form-label">Teaser Link</label>
                        <input class="form-control" type="text" name="teaser" value="{{json_decode($setting->content)->teaser}}" required>
                      </div>
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading" value="{{json_decode($setting->content)->heading}}" required>
                      </div>
                      <div class="mb-3">
                        <label class="col-form-label">Sub Heading</label>
                        {{-- <input class="form-control" type="text" value="{{json_decode($setting->content)->subheading}}"> --}}
                        <textarea class="form-control" name="subheading" id="" cols="30" rows="10" required>{{json_decode($setting->content)->subheading}}
                        </textarea>
                      </div>
                      <button class="btn btn-primary offset-md-5" type="submit">Update Record</button>
                    </form>
                  </div>
            </div>
  
          
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection
