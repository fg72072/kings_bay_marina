@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>List Blog</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">List Blog</li>
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
                    <th>Img</th>
                    <th>Title</th>
                    <th>Short Intro</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                      @foreach($blogs as $blog)
                      <tr>
                            <td class="id">{{$blog->id}}</td>
                            <td class="heading"><img src="{{asset('front/img/'.$blog->img)}}" width="100"></td>
                            <td class="description">{{$blog->title}}</td>
                            <td class="description">{{$blog->short_intro}}</td>
                            <td class="description">{{$blog->created_at}}</td>
                            <td class="d-flex">
                            <a href="{{url('admin/blog/edit/'.$blog->id)}}" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/blog/destroy/'.$blog->id)}}" method="post">
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