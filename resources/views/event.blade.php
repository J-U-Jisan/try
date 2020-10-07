@extends('layouts.index')

@section('content')
    <section class="help clearfix section-padding" id="upcoming">
        <div class="event container">
            <div class="row section-title home-event">
                <div class="col col-xs-12">
                    <h1><font style="color: #209e9a">Upcoming</font> Events</h1>
                </div>
            </div>
            @if($upcomings->count()==0)
                <div class="text-center">
                    <p class="text-danger">No Upcoming Event</p>
                    <p class="text-success"><button onclick="window.location.href='{{ route('donation') }}'" class="btn btn-success">Donate</button> more, so that we can arrange more event.</p>
                </div>
            @endif
            <div class="d-flex justify-content-center flex-wrap" >
                @foreach($upcomings as $upcoming)
                    <div class="card m-2" style="width: 21rem; background: #bde0e0;">
                        <img class="card-img-top" style="height: 220px;" src="{{ asset('storage/event/'.$upcoming->name) }}" alt="Card image cap">

                        <div class="card-body">
                            <h5 class="card-title">{{ $upcoming->title }}</h5>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit($upcoming->details, 100, '...') !!}
                                @if (strlen($upcoming->details) > 100)
                                    <a href="{{ route('event.view',[$upcoming->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                            <div class="card-text text-center p-3">
                                <button onclick="window.location.href='{{ route('donation') }}'" class="btn btn-dark event">Donate Now</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{ $upcomings->appends(['ongoing'=> $ongoings->currentPage(), 'closed'=>$closed_list->currentPage()])->render("pagination::bootstrap-4") }}
        </div>
    </section>
    <section class="help clearfix pt-5 pb-5" id="ongoing" style="background: #caecca">
        <div class="event container">
            <div class="row section-title home-event">
                <div class="col col-xs-12">
                    <h1><font style="color: #209e9a">On-Going</font> Events</h1>
                </div>
            </div>
            @if($ongoings->count()==0)
                <div class="text-center">
                    <p class="text-danger">No On-Going Event</p>
                    <p class="text-success"><button onclick="window.location.href='{{ route('donation') }}'" class="btn btn-success">Donate</button> more, so that we can arrange more event.</p>
                </div>
            @endif
            <div class="d-flex justify-content-center flex-wrap" >
                @foreach($ongoings as $ongoing)
                    <div class="card m-2" style="width: 21rem; background: #2efa8e;">
                        <img class="card-img-top" style="height: 220px;" src="{{ asset('storage/event/'.$ongoing->name) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ongoing->title }}</h5>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit($ongoing->details, 100, '...') !!}
                                @if (strlen($ongoing->details) > 100)
                                    <a href="{{ route('event.view',[$ongoing->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                            <div class="card-text text-center p-3">
                                <button onclick="window.location.href='{{ route('donation') }}'" class="btn btn-dark event">Donate Now</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{ $ongoings->appends(['upcoming'=> $upcomings->currentPage(), 'closed'=>$closed_list->currentPage()])->render("pagination::bootstrap-4") }}
        </div>
    </section>
    <section class="clearfix pt-5 pb-5" style="background: #F1F4F6;">
        <div class="event container">
            <div class="row section-title home-event">
                <div class="col col-xs-12">
                    <h1><font style="color: #209e9a">Closed</font> Events</h1>
                </div>
            </div>
            @if($closed_list->count()==0)
                <div class="text-center">
                    <p class="text-danger">No Closed Event</p>
                    <p class="text-success"><button onclick="window.location.href='{{ route('donation') }}'" class="btn btn-success">Donate</button> more, so that we can arrange more event.</p>
                </div>
            @endif
            <div class="d-flex justify-content-center flex-wrap" >
                @foreach($closed_list as $closed)
                    <div class="card m-2" style="width: 21rem;background: #aee7c9;">
                        <img class="card-img-top" style="height: 220px;" src="{{ asset('storage/event/'.$closed->name) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $closed->title }}</h5>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit($closed->details, 100, '...') !!}
                                @if (strlen($closed->details) > 100)
                                    <a href="{{ route('event.view',[$closed->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                            <div class="card-text text-center p-3">
                                <button onclick="window.location.href='{{ route('donation') }}'" class="btn btn-dark event">Donate Now</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{ $closed_list->appends(['upcoming'=> $upcomings->currentPage(), 'ongoing'=>$ongoings->currentPage()])->render("pagination::bootstrap-4") }}
        </div>
    </section>
@endsection
