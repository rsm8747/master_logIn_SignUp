@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <h3><i><b><u>Update Your Details....</u></b></i></h3>
        {{-- <form method="post" action="{{ route('update.details') }}" enctype="multipart/form-data"> --}}
        <form method="post" action="{{ route('update.details', $data->id) }}" enctype="multipart/form-data">

            @csrf


            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}"
                    placeholder="Rahul More" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}"
                    placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3" required>{{ $data->address }}</textarea>
            </div>

            <!-- Gender Options -->
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label" for="gender" required>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioMale"
                                {{ $data->gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioMale">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="female"
                                id="flexRadioFemale" {{ $data->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioFemale">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label" for="salute" required>Status:</label>
                        <select class="form-select" id="salute" name="salute" aria-label="Title" required>
                            <option selected disabled>Please select</option>
                            <option value="Single" {{ $data->salute == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ $data->salute == 'Married' ? 'selected' : '' }}>Married</option>
                            <option value="Divorced" {{ $data->salute == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                        </select>
                    </div>
                </div>
                <!-- Image Upload -->
                <div class="col-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label><br>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
            </div>

            <!-- Terms & Conditions -->

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terms" value="agree" id="flexCheckDefault"
                        {{ $data->terms ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        Agree Terms & Conditions
                    </label>
                </div>
            </div>
            <hr>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/list">
                    <button type="button" class="btn btn-secondary">Back</button>
                </a>
                </div>

        </form>
    </div>
@endsection
