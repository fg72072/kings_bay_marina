@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
<section class="main-section">



    <div class="container">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account Detail</li>
            </ol>
        </nav>

        <h3 class="mb-3">Account Details</h3>

        <div class="row account-box">

            @include('dashboard.sidebar')

            <div class="col-lg-10">

                <form class="custom-form" action="{{route('update-user')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">


                        <div class="form-group col-lg-12">
                            <label for="username">Email Address</label>
                            <input type="text" class="form-control" id="username" disabled value="{{$user->email}}">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" id="firstname">
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" id="lastname">
                        </div>

                        <!-- <div class="form-group col-lg-12">
                                <label for="email">E-mail Address <span class="required">*</span></label>
                                <input type="email" class="form-control" id="email">
                            </div> -->

                        <div class="form-group col-lg-12">
                            <input type="file" class="form-control" name="avatar" id="browse-file">

                            <div class="uploaded-images">

                                <img src="" id="img_uploaded" class="avatar">

                            </div>

                            <label for="browse-file" class="change-avatar">Change Gravatar</label>

                        </div>


                        <div class="form-group col-lg-6">
                            <label for="phone">Phone <span class="required">*</span></label>
                            <input type="tel" class="form-control" value="{{$user->phone}}" name="phone" id="phone" required>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="whatsapp">Whatsapp number</label>
                            <input type="tel" class="form-control" value="{{$user->whatsapp}}" name="whatsapp" id="whatsapp">
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="website">Website </label>
                            <input type="url" class="form-control" value="{{$user->web}}" name="website" id="website" required>
                        </div>

                        <div class="form-group col-lg-6">

                            <label for="state">State <span class="required">*</span></label>
                            <select class="form-control" name="state" id="state" required>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" @if($user->state == $state->id) selected @endif>{{$state->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-lg-6">
                            <label for="zipcode">Zip Code</label>
                            <input type="text" class="form-control" value="{{$user->zip_code}}" name="zip_code" id="zipcode">
                        </div>


                        <div class="form-group col-lg-12">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control">{{$user->address}}</textarea>
                        </div>

                        <div class="form-group col-lg-6">

                            <input type="submit" value="Update Account" class="custom-btn primary-btn">

                        </div>


                    </div>

                </form>

                <hr>

                <form class="custom-form py-5" action="{{url('user/update-password')}}" method="POST">
                    @csrf
                    <div class="row">

                        @if(session('success'))
                        <div class="mb-2">
                            <span class="text-success">{{session('success')}}</span>
                        </div>
                        @endif
                        <div class="form-group col-lg-6">
                            <label for="newpassword">New Password</label>
                            <input type="password" name="password" class="form-control" id="newpassword">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="confirmpassword">Confirm New Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="confirmpassword">
                        </div>


                        <div class="form-group col-lg-6">

                            <input type="submit" value="Update Password" class="custom-btn primary-btn">

                        </div>


                    </div>

                </form>

            </div>

        </div>

    </div>

</section>
@endsection