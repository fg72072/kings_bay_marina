@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Second Section</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Second Section</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <div class="row second-chart-list third-news-update">
          <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
            <form method="POST" action="{{url('admin/first/update/'.$setting->id)}}" enctype="multipart/form-data">
          <div class="card-body">
          <h3>Update Heading</h3>
            @csrf
            <div class="mb-3">
              <label class="col-form-label">Heading</label>
              <input class="form-control" type="text" name="heading" value="{{json_decode($setting->content)->heading}}" required>
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
                       @foreach($section as $sec)
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
</div>
@endsection