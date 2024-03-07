@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3>Add User</h3>
                <form method="post" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-2">
                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                            </div>

                            <!-- Gender Options -->
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" required>Gender</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="Male"
                                                id="flexRadioMale">
                                            <label class="form-check-label" for="flexRadioMale">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="Female"
                                                id="flexRadioFemale">
                                            <label class="form-check-label" for="flexRadioFemale">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3"><label for="">Status:</label>
                                        <select class="form-select" id="salute" name="salute" aria-label="Title"
                                            required>
                                            <option selected disabled>Select</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Terms & Conditions -->
                            <div class="mb-3">
                                <div class="form-check" required>
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Agree Terms & Conditions
                                    </label>
                                </div>
                            </div>
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
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card {
            margin-bottom: 50px;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
@endsection
