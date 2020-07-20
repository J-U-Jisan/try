@extends('layouts.index')

@section('content')
    <section class="clearfix section-padding" style="background: url({{ asset('images/volunteer.jpg') }}) no-repeat center center fixed;-webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
        <div class="container">
            <div class="card col-md-8 m-0 mx-auto" style="background: rgba(0,0,0,0.3);">
               <div class="card-header col-md-12 text-center font-weight-bold text-white" style="font-size: 25px;">Volunteer Registration Form</div>
                <div class="card-body mt-2">
                    @if (session()->has('message'))
                        <div class="alert alert-success w-100">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('volunteer') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname" class="text-white font-weight-bold">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname" class="text-white font-weight-bold">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="text-white font-weight-bold">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact" class="text-white font-weight-bold">Contact No</label>
                                <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter contact no" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender" class="text-white font-weight-bold">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Common Gender</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address" class="text-white font-weight-bold">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="form-control btn btn-danger mt-3">
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
