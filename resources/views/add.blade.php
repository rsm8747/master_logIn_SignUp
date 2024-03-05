@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <form method="post" action="">
            @csrf
            <div class="mb-3">
                <select class="form-select" id="salute" name="salute" aria-label="Title">
                    <option selected disabled>Salute</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Rahul More">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
            </div>

            <!-- Gender Options -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioMale">
                    <label class="form-check-label" for="flexRadioMale">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioFemale">
                    <label class="form-check-label" for="flexRadioFemale">
                        Female
                    </label>
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Agree Terms & Conditions
                    </label>
                </div>
            </div>
            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
