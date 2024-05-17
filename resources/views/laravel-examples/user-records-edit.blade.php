@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body pt-4 p-3">
                <form action="{{ route('records.update') }}" method="POST" role="form text-left">
                    @method('PUT')
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
                            <div class="form-group">
                                <label for="records">{{ 'Medical Records' }}</label>
                                <div class="@error('user.records')border border-danger rounded-3 @enderror">
                                    <textarea maxlength="650" class="form-control" id="records" rows="5" placeholder="Enter your elderly health notes." name="records" oninput="countLetters()">{{ $records->records }}</textarea>
                                    <span style="padding-left: 5px" class="text-xs" id="letterCount">0/650</span>
                                    <input type="hidden" name="records_id" class="form-control" value="{{ $records->records_id }}">
                                    <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->user_id }}">
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
        <style>
            #records:focus {
                border-color:#4a3aff;
                box-shadow:0 0 0 2px #4a3affa2;
                outline:0
            }
            #button{
                background-color: #4a3aff;
                color: white
            }
        </style>
<script>
    function countLetters() {
        const textarea = document.getElementById('records');
        const count = document.getElementById('letterCount');
        const maxLength = 650;
        const length = textarea.value.length;
        
        // Update the character count
        count.textContent = length + '/' + maxLength;
        
        // Optionally, you can change the color when reaching the limit
        if (length >= maxLength) {
            count.style.color = 'red';
        } else {
            count.style.color = 'black';
        }
    }
</script>

        @endsection