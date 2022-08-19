<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<body>
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <div class="login-card">
          <div>
            <div><a class="logo" href=""><img class="img-fluid for-light" src="{{asset('front/img/logo.svg')}}" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
            <div class="login-main">
              <form method="POST" action="{{ route('login') }}" class="theme-form">
                @csrf
                <h4>Sign in to account</h4>
                <p>Enter your email & password to login</p>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                  @error('email')
                  <span class="text-red" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  @if(session('error'))
                  <span class="text-red" role="alert">
                    <strong>{{ session('error') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" placeholder="*********">
                    <div class="show-hide"><span class="show"> </span></div>
                    @error('password')
                    <span class="text-red" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="text-center w-100">
                    <!-- <a class="" href="{{ route('password.request') }}">Forgot password?</a> -->
                  </div>
                  <div class="">
                    {{-- <label class="text-muted" for="checkbox1">Remember password</label> --}}
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
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
  @include('admin.includes.footer')
</body>

</html>