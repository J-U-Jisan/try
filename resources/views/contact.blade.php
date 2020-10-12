@extends('layouts.index')

@section('title', 'Contact Us | ')

@section('meta_title', 'Contact Us | Try')

@section('description', 'In case, you want to contact with us, we are always here for you.')

@section('content')
    <!--Section: Contact v.1-->
    <section class="section section-padding"  style="background: #d7d9d8">
        <div class="container">
        <!--Section heading-->
        <h2 class="section-heading h1 pt-4">Contact us</h2>
        <!--Section description-->
        <p class="section-description pb-4">In case, you want to contact with us, we are always here for you.</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-5 mb-4 mr-4">

                <!--Form with header-->
                <div class="card">

                    <div class="card-body">
                        <!--Header-->
                        <div class="card-header">
                            <h3><i class="fas fa-envelope"></i> Write to us:</h3>
                        </div>

                        <br>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact') }}">
                            <!--Body-->
                            @csrf
                            <div class="md-form">
                                <i class="fas fa-user prefix grey-text"></i>
                                <label for="form-name">Your name</label>
                                <input type="text" id="form-name" class="form-control" name="name" required>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <label for="form-email">Your email</label>
                                <input type="email" id="form-email" class="form-control" name="email" required>

                            </div>

                            <div class="md-form">
                                <i class="fas fa-tag prefix grey-text"></i>
                                <label for="form-Subject">Subject</label>
                                <input type="text" id="form-Subject" class="form-control" name="subject" required>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-pencil-alt prefix grey-text"></i>
                                <label for="form-text">Message</label>
                                <textarea id="form-text" class="form-control md-textarea" rows="3" name="message" required></textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-outline-dark" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!--Form with header-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6">

                <!--Google map-->
                <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1837.7011397516821!2d89.50236911019023!3d22.898528493552888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9bd0a54261cf%3A0x330f51a8cac7dd05!2sStudent%20Welfare%20Center%20(SWC)!5e0!3m2!1sen!2sbd!4v1594885736759!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">

                    </iframe>
                </div>

                <br>
                <!--Buttons-->
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
                        <p>KUET, 9203 Khulna</p>
                        <p>Bangladesh</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>
                        @foreach($footer_list as $footer)
                            <p>{{ $footer->mobile }}</p>
                         @endforeach
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>
                        @foreach($footer_list as $footer)
                            <p>{{ $footer->email }}</p>
                        @endforeach
                    </div>
                </div>

            </div>
            <!--Grid column-->

        </div>
        </div>
    </section>
    <!--Section: Contact v.1-->
@endsection
