@extends('admin.layouts.app')
@section('section')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Roadmap Section</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"> <i data-feather="home"></i></a>
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
                    <form method="POST" action="{{url('admin/roadmap-update/'.$setting->id)}}" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading" value="{{json_decode($setting->content)->heading}}" required>
                      </div>   
                      <button class="btn btn-primary offset-md-5" type="submit">Update Record</button>
                    </form>
                  </div>
            </div>
            @if (count($section) !=5)
            <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
                <div class="card-body">
                  <h3>Add Card</h3>
                    <form method="POST" action="{{route('add-roadmap')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading" value="" required>
                      </div> 
                      <div class="mb-3">
                        <label class="col-form-label">Description</label>
                             <textarea class="form-control" name="description" id="" cols="30" rows="5" required></textarea>
                      </div>      
                      <button class="btn btn-primary offset-md-5" type="submit">Add Record</button>
                    </form>
                  </div>
            </div>    
            @endif
            
        </div>
        <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                  <h3>Card List</h3>
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($section as $sec)
                        <tr>
                            <td class="id">{{$sec->id}}</td>
                            <td class=""><span class="heading">{{json_decode($sec->content)->heading}}</span> <span>{{$loop->iteration}}</span></td>
                            <td class="description">{{json_decode($sec->content)->description}}</td>
                            <td class="d-flex">
                            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/delete-roadmap-sub/'.$sec->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </td>
                          </tr>
                      @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                           <form method="POST" class="update-form" action="{{route('roadmap-sub-update')}}" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id"/>
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading"  required>
                      </div>
                      <div class="mb-3">
                        <label class="col-form-label">Description</label>
                             <textarea class="form-control" name="description" id="" cols="30" rows="5" required></textarea>
                      </div>      
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          
            </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
