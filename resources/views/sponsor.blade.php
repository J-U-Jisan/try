@extends('layouts.index')

@section('content')
    <div class="mt-2 p-3"></div>
    <section class="help clearfix pt-5 pb-5 mt-5" style="background: #8e8d8d;">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h2 class="text-white">OUR SPONSORS</h2>
                </div>
            </div>
            <div class="d-flex justify-content-center flex-wrap" >
                <div class="bg-danger text-white p-3">{{ $partners->count()==0?'No Sponsors. Contact for being sponsor of us':'' }}</div>
                @foreach($partners as $partner)
                    <div class="card center  col-md-3 m-3">
                        <div class="card-body" style="background: #dbdad8">
                            <img src="{{ asset('storage/partner/'.$partner->name) }}" class="img-fluid partner">
                            <p class="card-footer text-center font-weight-bold text-white mt-1" style="background: #424442; font-size: 20px;">{{ $partner->title }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
