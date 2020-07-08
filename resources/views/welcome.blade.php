@extends('layouts.index')

@section('content')
<div class="row">
    <div id="carouselExampleIndicators" class="carousel slide col-md-9" data-ride="carousel">
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
    <div class="col-md-3 mt-5">
        <div class="p-4"></div>
        <div class="card notice border-info">
            <div class="card-header text-center bg-success text-white">
                Notice
            </div>
            <div class="card-body" style="overflow: auto;">
                @foreach($notices as $notice)
                <p class="card-text text-center"><a target="_blank" href="{{ route('admin.notice.view',['id'=>$notice->id]) }}">{{ $notice->title }}</a></p>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
<main class="">
    <section class="clearfix">
        <div class="container-fluid pt-5 pb-5" style="background: #d4d3d3">
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

    <section class="help clearfix section-padding">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <span>Join our mission</span>
                    <h2>How Can You Help</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="help-item animated fadeInUp" style="visibility: visible; animation-iteration-count: 1; animation-duration: 3s; animation-delay: 0s;">
                  <span class="icon">
                    <i class="fas fa-donate"></i>
                  </span>
                        <div class="details">
                            <a href="#" data-toggle="modal" data-target="#donate-simple-modal"><h3>Donations</h3></a>
                            <p>Bidyanondo is always with you at any crisis in Bangladesh to help and support you.</p>
                        </div>
                    </div>
                    <div class="help-item animated fadeInUp" style="visibility: visible;  animation-iteration-count: 1; animation-duration: 3s; animation-delay: 0s;">
                        <span class="icon"><i class="fas fa-users"></i></span>
                        <div class="details">
                            <a href="#"><h3>Be a Volunteer of Us</h3></a>
                            <p>Bidyanondo will be proud of you to work as a volunteer and help people.</p>
                        </div>
                    </div>
                    <div class="help-item animated fadeInUp" style="visibility: visible;  animation-iteration-count: 1; animation-duration: 3s; animation-delay: 0s;">
                  <span class="icon">
                    <i class="fas fa-user-secret"></i>
                  </span>
                        <div class="details">
                            <a href="#"><h3>SPONSORSHIP</h3></a>
                            <p>Support us by your donations to create a better future.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="box col-md-offset-1 animated fadeInRight" style="visibility: visible;  animation-iteration-count: 1; animation-duration: 3s; animation-delay: 0s;">
                        <div class="video">
                            <img src="./img/bidyanondo-help_us_image.jpg" class="img img-responsive" alt="">
                            <a class="video-btn" href="#" data-type="iframe">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="card-full-body mb-5 container clearfix">
        <div class="row section-title">
            <div class="col col-xs-12">
                <h1><font>Latest</font> Projects</h1>
            </div>
        </div>

        <div class="card-deck card-slider owl-carousel">
            <div class="card">
                <img class="card-img-top" src="./img/Lets-Fight-against-COVID-19-small.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Lets Fight Against COVID-19</h5>
                    <p class="card-text">
                        Daily Iunch progrm, Disinfectant program, PPE for
                        medical personals, Hand sanitizes need your gener... <a href="#">Read more</a>
                    </p>
                    <a href="#" type="button" class="btn theme-btn card-btn text-center">Donate Now</a>
                </div>

            </div>
            <div class="card">
                <img class="card-img-top" src="./img/Food-Basket-For-Ramadan-small.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">IFTAR Basket For Homelles</h5>
                    <p class="card-text">1000,000 Ramadan Iftar-sehri
                        Basket distribution that exactly we are
                        planning to distribute food in t... <a href="#">Read more</a></p>
                    <a href="#" type="button" class="btn theme-btn card-btn text-center">Donate Now</a>
                </div>

            </div>
            <div class="card">
                <img class="card-img-top" src="./img/Zakat-for-Unemployed-Muslims-small.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Zakat For Unemployed Muslims</h5>
                    <p class="card-text">Rehabilitation project for jobless hawkers and farmers
                        badly needs your Zakat funnd Millions of smal... <a href="#">Read more</a>
                    </p>
                    <a href="#" type="button" class="btn theme-btn card-btn text-center">Donate Now</a>
                </div>

            </div>
            <div class="card">
                <img class="card-img-top" src="./img/project_image.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">One Taka Meal</h5>
                    <p class="card-text">
                        A very new and unique program began by Bidyanondo is 'Ek Takay Ahar',
                        which refers to 'food for a si... <a href="#">Read more</a>
                    </p>
                    <a href="#" type="button" class="btn theme-btn card-btn text-center">Donate Now</a>
                </div>
            </div>
        </div>
        <br><br><br>
        <button type="button" class="btn btn-projects-danger">VIEW ALL PROJECTS &nbsp; <i class="fas fa-long-arrow-alt-right"></i></button>
        <br><br>
    </section>
    <section class="clearfix cta-bg mb-5" style="background: #000 url(./img/cta-bg.png) center center/auto no-repeat local; padding: 70px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-sm-12">
                    <img class="img img-fluid img-responsive animated fadeInLeft" style="animation-duration: 2s;animation-delay: 0s;animation-iteration-count: 1;" src="./img/bidyanondo-cover_project_image.png" alt="">
                </div>
                <div class="col-12 col-md-6 col-md-offset-1 col-sm-12">
                    <div class="cta-body wow animated fadeInRight" style="animation-duration: 2s;animation-delay: 0s;visibility: visible; animation-iteration-count: 1;">
                        <h2>Let's fight against COVID-19</h2>
                        <p>
                            Bidyanondo has begun its Emergency COVID-19 campaign to
                            fight against Coronavirus to the most vulnerable people
                            in Bangladesh: the poor, disabled, jobless, hungry, elderly, and orphans.
                            We are attempting to distribute food among 500,000
                            people. We are all completely acknowledged about the
                            poor socio-economic condition of Bangladesh.COVID-19
                            has made the situation even worse by putting an already
                            poverty stricken population on lockdown where accessibility
                            to nutritional food, drinking water, products which are necessary
                            to maintain hygienic life-style, medicines and other daily commodities
                            are scarcer day by day. This project is addressing to cope up with the
                            emergency need with distribution of survival kits to thousands of people
                            who need it most.
                        </p>
                        <a href="#" type="button" class="btn theme-btn cta-btn text-center">Donate Now</a>
                    </div></div>
            </div>
        </div>
    </section>
    <section class="clearfix campaigns mb-5">
        <div class="container">
            <div class="row section-title">
                <div class="col col-xs-12">
                    <h1><font>Our</font> Campaigns</h1>
                </div>
            </div>
            <div class="card-deck mb-5">
                <div class="card">
                    <div class="ribbon">
                        <span><font>14</font> Photos</span>
                    </div>
                    <img class="card-img-top" src="./img/bidyanondo-1558158316-cover.jpg" alt="Card image cap">
                    <div class="card-body mb-5">
                        <h5 class="card-title">Wishfulness</h5>
                        <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> May 18,2019</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="ribbon">
                        <span><font>20</font> Photos</span>
                    </div>
                    <img class="card-img-top" src="./img/bidyanondo-1558158920-cover.jpg" alt="Card image cap">
                    <div class="card-body mb-5">
                        <h5 class="card-title">Basanti</h5>
                        <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> October 08,2018</small></p>
                    </div>
                </div>
                <div class="card">
                    <div class="ribbon">
                        <span><font>9</font> Photos</span>
                    </div>
                    <img class="card-img-top" src="./img/bidyanondo-1558159429-cover.jpg" alt="Card image cap">
                    <div class="card-body mb-5">
                        <h5 class="card-title">Our Garments Day-care</h5>
                        <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> July 04,2014</small></p>
                    </div>
                </div>
            </div>
            <a href="./html file/campaigns.html"><button type="button" class="btn btn-projects-danger">VIEW ALL PROJECTS &nbsp; <i class="fas fa-long-arrow-alt-right"></i></button></a>
        </div>
    </section>
    <section id="jon-us-cta" class="cta-2 mb-5">
        <div class="container-fluid">
            <div class="row">
                <div id="join-us" class="col-12 col-md-5 col-sm-4 join-us" style="background: rgba(0, 0, 0, 0) url(./img/bidyanondo-home_volunteer_image.jpg) no-repeat local center center / cover; height: 480px;">
                    <span>Join us</span>
                    <div class="dark-overlay"></div>
                </div>
                <div class="col-12 col-md-7 col-sm-8 sing-up wow fadeInRightSlow" style="visibility: visible; animation-name: fadeInRightSlow;">
                    <h3>Registration for volunteer program</h3>
                    <span>Serve the humanity</span>
                    <p>Our opportunity to volunteer to inspire a nation extends from the work of the Office to the grassroots personnel stage. If you have a commitment to time and work as a marginalized community, we are waiting to welcome you to our team.</p>
                    <button type="button" class="btn btn-outline-danger">REGISTRATION</button>
                </div>
            </div>
        </div>
    </section>

    <section class="clearfix subscribe">
        <div class="col float-left col-md-5">
            <img src="./img/bidyanondo-subscribe_image.jpg" class="img img-responsive img-fluid" alt="">
        </div>
        <div class="col float-left col-md-7">
            <div class="subscribe-body">
                <h2>Subscribe us</h2>
                <span>For News, updates and promotional events</span><br>
                <div class="plus">
                    <i class="fas float-right fa-plus fa-3x"></i>
                    &nbsp;
                    <i class="fas float-right fa-plus fa-3x"></i>
                </div>

                <div class="input-group">
                    <input type="email" name="email" class="form-control bg-light text-drak" placeholder="email address">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <button type="button" class="btn">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection




