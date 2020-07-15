@extends('layouts.index')

@section('content')
    <section class="help clearfix section-padding" id="upcoming">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h1><font style="color: #209e9a">Upcoming</font> Events</h1>
                </div>
            </div>
            @if($upcomings->count()==0)
                <div class="text-center">
                    <p class="text-danger">No Upcoming Event</p>
                    <p class="text-success"><button class="btn btn-success">Donate</button> more, so that we can arrange more event.</p>
                </div>
            @endif
            <div class="event-list d-flex justify-content-center flex-wrap" >
                @foreach($upcomings as $upcoming)
                    <div class="card col-md-4" style="background: #bde0e0">
                        <div class="img">
                            <img src="{{ asset('storage/event/'.$upcoming->name) }}" alt="Card image cap">
                        </div>

                        <div class="content">
                            <div class="title">{{ $upcoming->title }}</div>
                            <p>
                                {{ \Illuminate\Support\Str::limit($upcoming->details, 100, '...') }}
                                @if (strlen($upcoming->details) > 100)
                                    <a href="{{ route('event.view',[$upcoming->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                            <div class="btn">
                                <button class="btn-dark">Donate Now</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{ $upcomings->appends(['ongoing'=> $ongoings->currentPage(), 'closed'=>$closed_list->currentPage()])->render("pagination::bootstrap-4") }}
        </div>
    </section>
    <section class="help clearfix pt-5 pb-5" id="ongoing" style="background: #caecca">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h1><font style="color: #209e9a">On-Going</font> Events</h1>
                </div>
            </div>
            @if($ongoings->count()==0)
                <div class="text-center">
                    <p class="text-danger">No On-Going Event</p>
                    <p class="text-success"><button class="btn btn-success">Donate</button> more, so that we can arrange more event.</p>
                </div>
            @endif
            <div class="event-list d-flex justify-content-center flex-wrap" >
                @foreach($ongoings as $ongoing)
                    <div class="card col-md-4" style="background: #2efa8e">
                        <div class="img">
                            <img src="{{ asset('storage/event/'.$ongoing->name) }}" alt="Card image cap">
                        </div>
                        <div class="content">
                            <div class="title">{{ $upcoming->title }}</div>
                            <p>
                                {{ \Illuminate\Support\Str::limit($ongoing->details, 100, '...') }}
                                @if (strlen($upcoming->details) > 100)
                                    <a href="{{ route('event.view',[$ongoing->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                            <div class="btn">
                                <button class="btn-dark">Donate Now</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{ $ongoings->appends(['upcoming'=> $upcomings->currentPage(), 'closed'=>$closed_list->currentPage()])->render("pagination::bootstrap-4") }}
        </div>
    </section>
    <section class="clearfix pt-5 pb-5" style="background: #F1F4F6;">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h1><font style="color: #209e9a">Closed</font> Events</h1>
                </div>
            </div>
            @if($closed_list->count()==0)
                <div class="text-center">
                    <p class="text-danger">No Closed Event</p>
                    <p class="text-success"><button class="btn btn-success">Donate</button> more, so that we can arrange more event.</p>
                </div>
            @endif
            <div class="event-list d-flex justify-content-center flex-wrap" >
                @foreach($closed_list as $closed)
                    <div class="card col-md-4" style="background: #aee7c9">
                        <div class="img">
                            <img src="{{ asset('storage/event/'.$closed->name) }}" alt="Card image cap">
                        </div>
                        <div class="content">
                            <div class="title">{{ $closed->title }}</div>
                            <p>
                                {{ \Illuminate\Support\Str::limit($closed->details, 100, '...') }}
                                @if (strlen($closed->details) > 100)
                                    <a href="{{ route('event.view',[$closed->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                            <div class="btn">
                                <button class="btn-dark">Donate Now</button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            {{ $closed_list->appends(['upcoming'=> $upcomings->currentPage(), 'ongoing'=>$ongoings->currentPage()])->render("pagination::bootstrap-4") }}
        </div>
    </section>
@endsection
