@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Category</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
      <form method="POST" action="{{route('add-category')}}" enctype="multipart/form-data">
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
        <div class="card-body">
            @csrf
             <div class="mb-3">
              <label class="col-form-label">Select Parent Category</label>
              <select class="form-control" name="category" required>
                  @foreach($categories as $category)
                  @if($category->parent == 0)
                  <option value="{{$category->id}}">
                      {{$category->title}}
                  </option>
                  @endif
                  @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Title</label>
              <input class="form-control" type="text" name="title" value="" required>
            </div>
            <div class="service-only">
            <button class="btn btn-primary offset-md-5" type="submit">Publish</button>
           
            </div>
        </div>
    </div>
    </form>


    </div>
    <div class="row">
      <!-- Zero Configuration  Starts-->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h3>Category List</h3>
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Parent</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                       @foreach($categories as $category)
                       @if($category->parent != 0)
                        <tr>
                            <td class="id">{{$category->id}}</td>
                            <td class="heading">{{$category->title}}</td>
                            <td class="description">@if($category->parent == 1) Product @else Service @endif</td>
                            <td class="d-flex">
                            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/category/destroy/'.$category->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </td>
                          </tr>
                        @endif
                        @endforeach
                
                
                        </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                           <form method="POST" class="update-form" action="{{url('admin/category/update')}}" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                        
                        <input type="hidden" name="id"/>
                        <div class="mb-3 image-section">
                            
                        </div>
                      <div class="mb-3">
                        <label class="col-form-label">Title</label>
                        <input class="form-control" type="text" name="heading" required >
                      </div>
                          </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
  <!-- Container-fluid Ends-->
</div>
@endsection