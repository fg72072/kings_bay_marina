@extends('layouts.app')
@section('title')
Home
@endsection
@section('section')
    <div class="container-fluid p-0">
        <div class="row m-0">
          <div class="col-lg-5 m-auto p-0">    
            <div class="login-card">
              <div>
                <div class="login-main"> 
                <form method="POST" action="{{ route('password.email') }}" class="theme-form">
                        @csrf
                    <h4 class="text-center">Reset Password</h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                      <label class="col-form-label">Email</label>
                      <input class="form-control" type="email" name="email" required="" placeholder="">
                      @error('email')
                                    <span class="text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                    <div class="form-group mb-0">
                      <div class="">
                      <div class="text-end mt-3">
                        <button class="custom-btn primary-btn btn-block w-100" type="submit">Send Password Reset Link</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- login js-->
        <!-- Plugin used-->
      </div>
      @endsection
