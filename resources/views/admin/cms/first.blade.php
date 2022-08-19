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
            <li class="breadcrumb-item active">Home Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{url('admin/first/update/'.$firstsetting->id)}}" enctype="multipart/form-data">
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
                <input id="imageUpload" type="file" name="image" placeholder="Photo" capture="" value="">
              </div>
            </div>
            <div class="mb-3">
              <input class="form-control" type="hidden" name="section_id" value="{{$firstsection->id}}" required>
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="{{json_decode($firstsetting->content)->heading}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control" name="description" id="" cols="30" rows="3" required>{{json_decode($firstsection->content)->description}}</textarea>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>

          </div>
        </div>
    </form>


  </div>
  <!-- second section -->
  <div class="container-fluid">
  <h3 class="mt-3 mb-3">Second Section</h3>

    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <form method="POST" action="{{url('admin/first/update/'.$secondsetting->id)}}" enctype="multipart/form-data">
          <div class="card-body">
            <h3>Update Heading</h3>
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="{{json_decode($secondsetting->content)->heading}}" required>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>
          </div>
        </form>
      </div>
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <form method="POST" action="{{route('add.section')}}" enctype="multipart/form-data">
          <div class="card-body">
            <h3>Add List</h3>
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="" required>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Publish</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
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
                    <th>Heading</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($secondsection as $sec)
                  <tr>
                    <td class="id">{{$sec->id}}</td>
                    <td class="heading">{{$sec->content}}</td>
                    <td class="d-flex">
                      <form id="delete-form" action="{{url('admin/section/delete/'.$sec->id)}}" method="post">
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
  <!-- third section -->
  <div class="container-fluid">
  <h3 class="mt-3 mb-3">Third Section</h3>

    <form method="POST" action="{{url('admin/first/update/'.$thirdsetting->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <input class="form-control" type="hidden" name="section_id" value="{{$thirdsection->id}}" required>
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="{{json_decode($thirdsetting->content)->heading}}" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Description</label>
              <textarea class="form-control" name="description" id="" cols="30" rows="3" required>{{json_decode($thirdsection->content)->description}}</textarea>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>

          </div>
        </div>
    </form>


  </div>
  <!-- setting section -->
  <div class="container-fluid">
  <h3 class="mt-3 mb-3">Setting Section</h3>
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <form method="POST" action="{{url('admin/setting/update/'.$settingsection->id)}}" enctype="multipart/form-data">
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
              <label class="col-form-label">Location</label>
              <input class="form-control" type="text" name="location" value="{{json_decode($settingsection->content)->location}}">
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  @endsection