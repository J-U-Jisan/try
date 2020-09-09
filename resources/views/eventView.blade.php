@extends('layouts.index')

@section('content')
    <section class="help clearfix section-padding mt-5">
        <div class="container">
            <div class="row col-md-12">
                <div class="col-md-5 float-left">
                    <img src="{{ asset('storage/event/'.$event->name) }}" class="col-md-12">
                </div>
                <div class="col-md-7 float-left justify-content-center">
                    <div class="ml-4 col-md-8 float-left">
                        <h2>{{ $event->title }}</h2>
                    </div>
                    <div class="col-md-3 float-right">
                        <button onclick="window.location.href='{{ route('donation') }}'" class="form-control btn btn-success font-weight-bold">Donate Now</button>
                    </div>
                    <div class="mt-5 ml-5 pt-5">
                        {!! $event->details !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4 float-right">
                <button type="button" class="btn btn-facebook"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp; Share</button>
                <button type="button" class="btn btn-whatsapp"><i class="fab fa-whatsapp"></i>&nbsp;&nbsp; Share</button>
            </div>
        </div>
    </section>
@endsection
