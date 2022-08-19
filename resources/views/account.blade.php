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
        <li class="breadcrumb-item active" aria-current="page">My Account</li>
        </ol>
    </nav>

    <h3 class="mb-3">My Account</h3>

   
    <div class="row my-5">

        <div class="col-lg-6">

            <h5 class="mb-3">Login</h5>
            
            <form class="custom-form" action="{{url('user/login')}}" method="post">
            @csrf

                <div class="row">

                    <div class="form-group">
                        <label for="username-email">Email *</label>
                        <input type="text" name="email" class="form-control" required id="username-email">
                       
                    </div>

                    @if(session('error'))
                    <div class="form-group">
                        <span class="text-danger">{{session('error')}}</span>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" name="password" class="form-control" required id="password">
                        
                    </div>

                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div> -->
                
                </div>

                <div class="form-group">
                    <a href="{{ route('password.request') }}" class="">Forgot your password?</a>
                </div>

                <div class="form-group">
                    <input type="submit" value="Login" class="custom-btn primary-btn">
                </div>
                
            </form>


        </div>

        <div class="col-lg-6">

            <h5 class="mb-3">Register</h5>

            <form class="custom-form" action="{{url('user/register')}}" method="POST">
            @csrf
                <div class="row">

                    <div class="form-group col-lg-6">
                        <label for="firstname">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="firstname">
                        @error('first_name') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="lastname">
                        @error('last_name') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div> -->

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone">
                        @error('phone') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                        @error('email') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @error('password') 
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    </div>
                </div>

                <div class="form-group text-end">
                    <input type="submit" value="Register" class="custom-btn primary-btn">
                </div>
               

            </form>
           
        </div>

    </div>


 
    
</div>

</section>
@endsection