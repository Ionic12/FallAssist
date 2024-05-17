@extends('layouts.user_type.guest') @section('content') 
<section class="max-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3" style="background-image: url('../assets/img/curved-images/curved8.jpg'); border-radius: 0px 0px 20px 20px;">
    <span class="mask bg-gradient-dark opacity-5"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          <p class="text-lead text-white">
            Welcome to our monitoring platform! Securely access real-time insights with just a login, ensuring a vigilant watch over your systems and data
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="text-center pt-4">
            <h5>Login</h5>
          </div>
          <div class="card-body">
            <form role="form" method="POST" action="/session">
              @csrf
              <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email" value="admin@softui.com" aria-describedby="email-addon">
                @error('email')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" value="secret" aria-describedby="password-addon">
                @error('password')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" id="button" class="btn w-100 mt-3 mb-0">Sign in</button>
              </div>
            </form>
            {{-- <p class="text-sm text-center mt-4 mb-0">
              Forgot you password? Reset you password <a href="/login/forgot-password" class="button-link font-weight-bolder">here</a>
            </p> --}}
            <p class="text-sm text-center mt-4 mb-0">
              Don't have an account? <a href="register" class="button-link font-weight-bolder">Sign up</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  #password:focus,
  #email:focus {
    border-color:#4a3aff;
    box-shadow:0 0 0 2px #4a3affa2;
    outline:0
  }
  #button{
    background-color: #4a3aff;
    color: white
  }
  .button-link{
    color: #4a3aff;
    font-weight:400;
    text-decoration:none;
  }
  .button-link:hover{
    color: #4a3aff;
    text-decoration:none
  }
</style>
@endsection