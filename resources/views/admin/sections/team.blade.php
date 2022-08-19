@extends('admin.layouts.app')
@section('section')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Team Section</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Team</li>
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
                    <form method="POST" action="{{url('admin/team-update/'.$setting->id)}}" enctype="multipart/form-data">
                        @csrf
                     
                      {{-- @foreach ($section as $sec)
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading" value="{{json_decode($sec->content)->heading}}" >
                      </div>    
                      @endforeach --}}
                      <div class="mb-3">
                        <label class="col-form-label">Heading</label>
                        <input class="form-control" type="text" name="heading" value="{{json_decode($setting->content)->heading}}" >
                      </div>   
                      <button class="btn btn-primary offset-md-5" type="submit">Update Record</button>
                    </form>
                  </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
                <div class="card-body">
                  <h3>Add Team</h3>
                    <form method="POST" action="{{route('add-team')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <div id="profile-container">
                                    <img class="rounded-circle" id="profileImage" src="" alt="Upload Icon" data-holder-rendered="true" max-height="10px;" max-width="100px;" style="height:100px;width:100px;">
                                </div>
                                <br>
                                <input id="imageUpload" type="file" name="image" placeholder="Photo" capture="" value="" required>
                            </div>
                        </div>
                      <div class="mb-3">
                        <label class="col-form-label">Name</label>
                        <input class="form-control" type="text" name="heading" value="" required>
                      </div>   
                      <div class="mb-3">
                        <label class="col-form-label">Description</label>
                        <input class="form-control" type="text" name="subheading" value="" required>
                      </div>      
                      <button class="btn btn-primary offset-md-5" type="submit">Add Record</button>
                    </form>
                  </div>
            </div>
  
          
        </div>
        <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                  <h3>Team List</h3>
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($section as $sec)
                        <tr>
                            <td class="id">{{$sec->id}}</td>
                            <td class="icon"><img width="50" class="rounded-circle" src="{{asset('front/images/'.json_decode($sec->content)->image)}}" alt=""></td>
                            <td class="heading">{{json_decode($sec->content)->name}}</td>
                            <td class="subheading">{{json_decode($sec->content)->description}}</td>
                            <td class="d-flex">
                            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="{{url('admin/delete-team-sub/'.$sec->id)}}" method="post">
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
                           <form method="POST" class="update-form" action="{{route('team-sub-update')}}" enctype="multipart/form-data">
                        <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id"/>
                        <div class="mb-3 image-section">
                            
                        </div>
                      <div class="mb-3">
                        <label class="col-form-label">Name</label>
                        <input class="form-control" type="text" name="heading"  required>
                      </div>
                      <div class="mb-3">
                        <label class="col-form-label">Description</label>
                        <input class="form-control" type="text" name="subheading"  required>
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
