@extends('layouts.index')

@section('content')
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide col-md-12" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $cnt=0; ?>
                @foreach($sliders as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $cnt }}" class="{{ $cnt?'': 'active' }}"></li>
                    <?php $cnt++ ?>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $cnt=0; ?>
                @foreach($sliders as $slider)
                    <?php $cnt++; ?>

                    <div class="carousel-item {{ $cnt!=1?'': 'active' }}">
                        <img class="d-block w-100 slider-h" src="{{ asset('storage/slider/'.$slider->name) }}">
                        <div class="carousel-caption d-none d-md-block">
                            <button onclick="window.location.href='{{ route('donation') }}'" type="button" class="btn btn-donate-hero font-weight-bold px-4 py-2" data-toggle="modal" data-target="#exampleModalCenter">DONATE</button>
                        </div>
                    </div>
                @endforeach

            </div>
            <a class="carousel-control-prev mt-5" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next mt-5" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <main class="">
        <section class="clearfix">
            <div class="container-fluid pt-5 pb-5" style="background: #e5e7e6;">
                <h3 class="text-center">Thoughts About Try</h3>
                <div class="row mt-5">
                    @foreach($videos as $video)
                        <div class="col-md-5 col-sm-12" style="margin: 0 auto !important;">
                            <iframe height="400" class="col-md-12" src="{{ $video->link }}"
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="cta-5 section-padding" style="background: #fff;" id="mission">
            <div class="container">
                <div class="row section-title-t2">
                    <div class="col col-md-8 col-md-offset-2">
                        <h2 style="margin-bottom: 12px"><span>Our</span> Mission </h2>
                        <p>Provide support to underprivileged section of the society specially extreme poor/ homeless and orphan children through quality education ,nourishment &amp; shelter to make them resources for the nation.</p>
                    </div>
                </div>
                <div class="row content">
                    <div class="col-md-4">
                        <div class="wow fadeInLeftSlow" style="visibility: visible; animation-name: fadeInLeftSlow;">
              <span class="icon">
                <i class="fas fa-utensils fa-5x"></i>
              </span>
                            <h3>Food</h3>
                            <p>We want to inspire a nation with food. Best relation can be created through sharing food.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wow fadeInLeftSlow" style="visibility: visible; animation-name: fadeInLeftSlow;">

                            <span class="icon"><i class="fas fa-graduation-cap fa-5x"></i></span>
                            <h3>Education</h3>
                            <p>
                                To become a national treasure by offering free education to children and orphans</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wow fadeInLeftSlow" style="visibility: visible; animation-name: fadeInLeftSlow;">

                            <span class="icon"><i class="fas fa-briefcase-medical fa-5x"></i></span>
                            <h3>Treatment</h3>
                            <p>To deliver free medicines and health care to underprivileged people</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="card-full-body container mb-5">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h1><font>LATEST</font> EVENTS</h1>
                </div>
            </div>
            <div class="event-slider">
                @foreach($events as $event)
                    <div class="card">
                        <div class="img"><img src="{{ asset('storage/event/'.$event->name) }}" alt=""></div>
                        <div class="content">
                            <div class="title">{{ $event->title }}</div>

                            <p>{!! \Illuminate\Support\Str::limit($event->details, 100, '...') !!}
                                @if (strlen($event->details) > 100)
                                    <a href="{{ route('event.view',[$event->id]) }}">
                                        <span id="dots">Read more</span></a>
                                @endif
                            </p>
                        </div>
                        <div class="btn">
                            <button onclick="window.location.href='{{ route('donation') }}'">Donate Now</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <br><br><br>
            <button onclick="window.location.href='{{ route('event') }}'" type="button" class="btn btn-projects-danger">VIEW ALL EVENTS &nbsp; <i class="fas fa-long-arrow-alt-right"></i></button>
            <br><br>
        </section>

        <section id="jon-us-cta" class="cta-2">
            <div class="container-fluid">
                <div class="row">
                    <div id="join-us" class="col-12 col-md-5 col-sm-4 join-us"
                         style="background: url({{ asset('images/join.jpg') }}) center center / cover no-repeat local;
    height: 474px;">
                        <span style="font-size: 30px;">Join us</span>
                        <div class="dark-overlay"></div>
                    </div>
                    <div class="col-12 col-md-7 col-sm-8 sing-up wow fadeInRightSlow" style="visibility: visible; animation-name: fadeInRightSlow;">
                        <h3>Registration for volunteer program</h3>
                        <span>Serve the humanity</span>
                        <p>Our opportunity to volunteer to inspire a nation extends from the work of the Office to the grassroots personnel stage. If you have a commitment to time and work as a marginalized community, we are waiting to welcome you to our team.</p>
                        <button type="button" class="btn btn-outline-danger" onclick="window.location.href='{{ route('volunteer') }}'">REGISTRATION</button>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection




