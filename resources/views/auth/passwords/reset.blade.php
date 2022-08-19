

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
                <form method="POST" action="{{ route('password.update') }}" class="theme-form">
                        @csrf
                    <h4>Reset Password</h4>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input class="form-control" type="email" name="email" required="" value="{{ $email ?? old('email') }}" placeholder="">
                        @error('email')
                                      <span class="text-red" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                      @enderror
                      </div>
                    <div class="form-group">
                      <label class="col-form-label">Password</label>
                      <input class="form-control" type="password" name="password" required="" placeholder="">
                      @error('password')
                                    <span class="text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Confirm Password</label>
                      <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password_confirmation"  placeholder="*********">
                      </div>
                    </div>
                    <div class="form-group mb-0">
                      <div class="">
                      <div class="text-end mt-3">
                        <button class="custom-btn primary-btn btn-block w-100" type="submit">Reset Password</button>
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
