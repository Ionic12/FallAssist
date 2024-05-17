@extends('layouts.user_type.guest') @section('content') <section class="max-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3" style="background-image: url('../assets/img/curved-images/curved14.jpg'); border-radius: 0px 0px 20px 20px;">
    <span class="mask bg-gradient-dark opacity-5"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          <p class="text-lead text-white">
            Join FallAssist – Empowering you to monitor and safeguard your world. Let’s get started on a journey to secure tranquility for your loved ones.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        @if (session('success'))
        <div class="alert alert-success text-center" style="color: white" role="alert">{{ session('success') }}</div>
        @endif @if (session('error'))
        <div class="alert alert-danger text-center" style="color: white">{{ session('error') }}</div>
        @endif
        <div class="card z-index-0">
          <div class="text-center pt-4">
            <h5>Register</h5>
          </div>
          <div class="card-body">
            <form role="form text-left" method="POST" action="/register">
              @csrf
              <div class="mb-3">
                <input class="form-control" type="text" placeholder="Name" id="name" name="name" pattern="[a-zA-Z ]+" title="Please enter only letters and spaces" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '')" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <input class="form-control" type="number" placeholder="Phone" id="phone" maxlength="13" name="phone" pattern="[0-9]*" title="Please enter only numbers" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ old('phone') }}">
                @error('name')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <input class="form-control" type="text" placeholder="Mac Address" id="mac" name="mac"  value="{{ old('mac') }}">
                @error('mac')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                @error('password')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" id="button" class="btn w-100 mt-3 mb-2">Sign up</button>
              </div>
              <p class="text-sm text-center mt-3 mb-0">
                Already have an account? <a href="login" class="button-link font-weight-bolder">Sign in</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  #name:focus,
  #phone:focus,
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
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<script>
  function validatePhone(e) {
    const input = e.target;
    const value = input.value;
    const regex = /^[0-9]*$/;
    if (!regex.test(value)) {
      input.value = value.replace(/[^0-9]/g, "");
    }
  }
  function validateIdchat(e) {
    const input = e.target;
    const value = input.value;
    const regex = /^[0-9]*$/;
    if (!regex.test(value)) {
      input.value = value.replace(/[^0-9]/g, "");
    }
  }
  document.getElementById("idchat").addEventListener("input", validateIdchat);
  document.getElementById("phone").addEventListener("input", validatePhone);
</script>
@endsection