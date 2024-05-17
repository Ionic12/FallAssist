@extends('layouts.user_type.auth')
@section('content')
<div>
   <div class="container-fluid">
      <div class="card">
         <div class="card-body pt-4 p-3">
            <form action="{{ route('contact.store') }}" method="POST" role="form text-left">
               @csrf
               @if($errors->any())
               <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                  <span class="alert-text text-white">
                  {{$errors->first()}}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <i class="fa fa-close" aria-hidden="true"></i>
                  </button>
               </div>
               @endif
               @if(session('success'))
               <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                  <span class="alert-text text-white">
                  {{ session('success') }}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <i class="fa fa-close" aria-hidden="true"></i>
                  </button>
               </div>
               @endif
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="name" class="form-control-label">{{ __('Full Name') }}</label>
                        <div class="@error('name')border border-danger rounded-3 @enderror">
                           <input class="form-control" type="text" placeholder="Name" id="name" name="name"
                              pattern="[a-zA-Z ]+" title="Please enter only letters and spaces"
                              oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '')">
                           @error('name')
                           <p class="text-danger text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="phone" class="form-control-label">{{ __('Phone Number') }}</label>
                        <div class="@error('phone')border border-danger rounded-3 @enderror">
                           <input class="form-control" maxlength="13" type="number" placeholder="Phone Number" id="phone" name="phone" pattern="^[0-9]*$">
                           @error('phone')
                           <p class="text-danger text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="username" class="form-control-label">{{ __('Username Telegram') }}</label>
                        <div class="@error('username')border border-danger rounded-3 @enderror">
                           <input class="form-control" type="text" placeholder="Username Telegram" id="username" name="username">
                           @error('name')
                           <p class="text-danger text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="idchat" class="form-control-label">{{ __('ID Chat Telegram') }}</label>
                        <div class="@error('idchat')border border-danger rounded-3 @enderror">
                           <input class="form-control" type="number" placeholder="ID Chat Telegram" id="idchat" maxlength="15" name="idchat" >
                           @error('idchat')
                           <p class="text-danger text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
               <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->user_id }}">
               <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg" >
                  <div class="d-flex flex-column" style="text-align: justify">
                     <span class="mb-1 text-xs"><span class="text-dark font-weight-bold">Ensure accurate contact information entry, as this contact will be used to receive emergency notifications. To find your Telegram chat ID, you can use a Telegram bot. Remember that your Telegram chat ID is different from your username. To enhance effectiveness and the ability to send messages to many people, you can register the Telegram group chat ID to be accepted by a large number of members.
                  </div>
               </li>
               <div class="d-flex justify-content-end">
                  <button type="button" class="btn bg-gradient-dark mt-3 mb-3" onclick="window.history.back();">{{ 'Back' }}</button>
                  <button type="submit" id="button" class="btn mt-3 mb-3 ms-2">{{ 'Save Changes' }}</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   function validatePhone(e) {
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
<style>
    #name:focus,
    #username:focus,
    #phone:focus,
    #idchat:focus {
      border-color:#4a3aff;
      box-shadow:0 0 0 2px #4a3affa2;
      outline:0
    }
    #button{
      background-color: #4a3aff;
      color: white
    }
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
@endsection