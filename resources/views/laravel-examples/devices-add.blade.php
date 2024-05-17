@extends('layouts.user_type.auth')
@section('content')
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body pt-4 p-3">
                       <form action="{{ route('devices.store') }}" method="POST" role="form text-left">
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
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mac" class="form-control-label">{{ __('MAC Address') }}</label>
                                    <div class="@error('mac') border border-danger rounded-3 @enderror">
                                        <input class="form-control @error('mac') is-invalid @enderror"
                                               type="text"
                                               placeholder="MAC Address (e.g., 00:1E:67:FF:BB:CC)"
                                               id="mac"
                                               name="mac"
                                               data-vv-mask="HH:HH:HH:HH:HH:HH">
                                        @error('mac')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>                                
                             </div>
                          </div>
                          <div class="d-flex justify-content-end">
                             <button type="button" class="btn bg-gradient-dark mt-3 mb-3" onclick="window.history.back();">{{ 'Back' }}</button>
                             <button type="submit" id="button" class="btn mt-3 mb-3 ms-2">{{ 'Save Changes' }}</button>
                          </div>
                       </form>
                    </div>
                 </div>
                
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('mac').addEventListener('input', function () {
        // Format input menjadi MAC address
        this.value = this.value.replace(/[^0-9A-Fa-f:-]/g, '').toUpperCase();
    });
</script>
<style>
    #mac:focus{
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