@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Add User</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Add User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{route('add-user')}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            <div class="mb-3">
              <label class="col-form-label">FirstName</label>
              <input class="form-control" type="text" name="first_name" value="" required>
              @error('first_name')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">LastName</label>
              <input class="form-control" type="text" name="last_name" value="" required>
              @error('last_name')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Email</label>
              <input class="form-control" type="text" name="email" value="" required>
              @error('email')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Password</label>
              <input class="form-control" type="password" name="password" value="" required>
              @error('password')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Confirm Password</label>
              <input class="form-control" type="password" name="password_confirmation" value="" required>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Role</label>
              <select class="form-control" name="role">
                <option value="0">User</option>
                <option value="1">Admin</option>
              </select>
            </div>
            <button class="btn btn-primary offset-md-5" type="submit">Publish</button>

          </div>
        </div>
    </form>


  </div>
  <div class="row">
    <!-- Zero Configuration  Starts-->
    <!-- <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <h3>FAQs List</h3>
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
                        <tr>
                            <td class="id"></td>
                            <td class="heading"></td>
                            <td class="description"></td>
                            <td class="d-flex">
                            <a href="javascript::void();" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary edit">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                            <form id="delete-form" action="" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            </td>
                          </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> -->

  </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection