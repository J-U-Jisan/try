@extends('layouts.index')

@section('content')
    <section class="help clearfix pt-5 pb-5 mt-5" style="background: #e5e7e6;">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h2 class="text-black-50">OUR SPONSORS</h2>
                </div>
            </div>
            <div class="d-flex justify-content-center flex-wrap" >
                @if($partners->count()==0)
                    <div class="bg-danger text-white p-3">No Sponsors. Contact for being sponsor of us</div>
                @endif
                @foreach($partners as $partner)
                        <div class="card m-2" style="width: 18rem;">
                            <img src="{{ asset('storage/partner/'.$partner->name) }}" class="card-img-top partner" alt="...">
                            <div class="card-footer text-center" style="background: #8fed84;">
                                <p class="card-text font-weight-bold">{{ $partner->title }}</p>
                            </div>
                        </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
