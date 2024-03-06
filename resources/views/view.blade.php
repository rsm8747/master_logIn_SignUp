@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h3><i><b><u>Profile View</u></b></i></h3>
        <form>

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
            {{-- Status --}}
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="salute" class="form-label">Status:</label>
                        <input type="text" id="salute" class="form-control" value="{{ $user->salute }}" readonly>
                    </div>
                </div>
                <!-- Gender -->
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <input type="text" class="form-control" value="{{ ucfirst($user->gender) }}" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label><br>
                        @if ($user->image)
                            <img src="{{ Storage::url($user->image) }}" alt="User Image" width="100">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <!-- Close Button -->
            <div class="text-center">
                <a href="/list">
                    <button type="button" class="btn btn-secondary">Back</button>
                </a>
            </div>
        </form>
    </div>
@endsection
