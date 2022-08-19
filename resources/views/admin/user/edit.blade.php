@extends('admin.layouts.app')
@section('section')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Edit User</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard
                        ')}}"> <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit User</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <form method="POST" action="{{url('admin/user/update/'.$user->id)}}" enctype="multipart/form-data">
      <div class="row second-chart-list third-news-update">
        <div class="col-xl-6 col-lg-6 col-6  morning-sec ">
          <div class="card-body">
            @csrf
            
           
            <div class="mb-3">
              <label class="col-form-label">FirstName</label>
              <input class="form-control" type="text" name="first_name" value="{{$user->firstname}}" required>
              @error('first_name')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">LastName</label>
              <input class="form-control" type="text" name="last_name" value="{{$user->lastname}}" required>
              @error('last_name')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="col-form-label">Email</label>
              <input class="form-control" type="text" name="email" value="{{$user->email}}" required>
              @error('email')
              <span class="invalid-feedback" >
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            @if(Auth::user()->id == $user->id)
            <div class="mb-3">
              <label class="col-form-label">Current Password</label>
              <input class="form-control" type="password" name="current_password" value="" required>
              @if(session('error'))
            <span class="invalid-feedback"><strong>{{session('error')}}</strong></span>
            @endif
              @error('current_password')
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
            @endif
            @if(session('success'))
            <div class="mb-3">
            <span class="text-green">{{session('success')}}</span>
            </div>
            @endif
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