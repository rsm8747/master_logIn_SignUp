@extends('layouts.app')

@section('content')
    <h3><i><b><u>Profile View</u></b></i></h3>
    <div class="container mt-7">
        <div class="card" style="width: 20rem;">
            <img src="{{ $user->image ? asset('images/' . $user->image) : 'placeholder.jpg' }}" class="card-img-top"
                alt="User Image" width="200px" height="200px">
            <div class="card-body">
                <h3 class="card-title"><b><i><u>{{ ucfirst($user->name) }}</u></i></b></h3>
                <p class="card-text"><strong>Email: </strong>{{ $user->email }}</p>
                <p class="card-text"><strong>Gender: </strong>{{ ucfirst($user->gender) }}</p>
                <p class="card-text"><strong>Status: </strong>{{ ucfirst($user->salute) }}</p>
                <p class="card-text"><strong>Address: </strong>{{ ucfirst($user->address) }}</p>
                {{-- <p class="card-text"><strong>Address: </strong>{{ $user->address }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <strong>Status: </strong>{{ $user->salute }}</li>
                <li class="list-group-item"> <strong>Gender: </strong>{{ ucfirst($user->gender) }}</li>
            </ul> --}}
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('list') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .container {
                padding-top: 2rem;
                max-width: 500px;
                max-height: 700px;
            }
        </style>
    </div>
@endsection
