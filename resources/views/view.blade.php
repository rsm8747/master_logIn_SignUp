@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3><i><b><u>Profile View</u></b></i></h3>
    <style>
        
    </style>
    <form>
        <div class="row">
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <div class="image123" style="border: 2px solid black ; max-width: 200px">
                        @if ($user->image)
                            <img src="{{ asset('images/' . $user->image) }}" alt="User Image" width="200px" height="200px">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-9">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" rows="3" readonly>{{ $user->address }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Salute</label>
                    <input type="text" class="form-control" value="{{ $user->salute }}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text" class="form-control" value="{{ ucfirst($user->gender) }}" readonly>
                </div>
            </div>
            
        </div>
            </div></div>
        
        
        <hr>
        <div class="text-center">
            <a href="{{ route('list') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
