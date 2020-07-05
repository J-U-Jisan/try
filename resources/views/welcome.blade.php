<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./animation.css">
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/jquerysctipttop.css">
    <link rel="stylesheet" href="./css/plugin.css">
    <style>
        .title-try{
            color: black;
            font-style: italic;
            font-family: cursive;
            font-size: 20px;
            position: relative;
            transform: translateY(12px);
            display: inline-flex;
        }
        @media (max-width: 575.98px) {
            .title-try{
                color: black;
                font-style: italic;
                font-family: cursive;
                font-size: 10px;
                position: relative;
                transform: translateY(10px);
                display: inline-flex;
            }
        }

    </style>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.html">
        <img src="./images/logo.png" alt="Try" class="col-7 col-md-4">
        <span class="title-try">Be the reason someone smiles today</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="transform: translateX(32%);" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">HOME</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EVENT
                </a>
                <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Upcoming </a><hr>
                    <a class="dropdown-item" href="#">On Going</a><hr>
                    <a class="dropdown-item" href="#">Closed</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FUND RAISING
                </a>
                <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Upcoming</a><hr>
                    <a class="dropdown-item" href="#">On Going</a><hr>
                    <a class="dropdown-item" href="#">Closed</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./html file/sponsor.html">CATEGORIES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./html file/sponsor.html">BLOG</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ABOUT
                </a>

                <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">History</a><hr>
                    <a class="dropdown-item" href="#">Mission & Vission</a><hr>
                    <a class="dropdown-item" href="#">Member</a><hr>
                    <a class="dropdown-item" href="#work">How it works</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
<main class="" style="">
    <section class="clearfix urgent-donation-s2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12 urgent-donation" style="background: url(./img/bidyanondo-scholarship_thumbnail_image.jpg) center center/cover no-repeat local;">

                    <div class="donation">
                        <h2>Sponsor a Child</h2>
                        <span>Empowering childern for a bright future</span>
                        <p class="text-justify">
                            We are taking the responsibility of 300 orphan
                            children through our orphanages in Bangladesh.
                            You can change the life of underprivileged
                            children by paying 2000 BDT per months. You
                            can lead them to have a bright future with
                            your monthly donations.
                        </p>
                        <a href="./html file/sponsor.html"><button type="button" style="animation-duration: 2s;animation-delay: 0s;animation-iteration-count: 1;" class="btn animated fadeInDown float-left btn-projects-danger">Sponsor</button></a>
                    </div>
                </div>
                <div class="col-md-5 col-12 donation-meter-body" style="text-align: center;">
                    <div class="donation-meter-details">
                        <div class="raised">
                            <span>Raised</span>
                            <h3>272</h3>
                        </div>

                        <div class="col-sm-4 col-sm-offset-4">
                            <div class="my-progress-bar"></div>
                        </div>

                        <div class="goal">
                            <span>Goal</span>
                            <h3>300</h3>
                        </div>
                    </div>
                    <div class="donation-form">
                        <form class="form">
                            <div><a href="./html file/sing-up.html" class="btn theme-btn">Sign up</a></div>
                            <div><a href="./html file/sponsor.html" class="btn theme-btn">Sponsor</a></div>
                        </form>
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
    <section class="cta-5 section-padding" style="background: #fff;">
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
<footer class="footer">
    <div class="container clearfix section-padding">
        <div class="col float-left col-md-5">
            <div style="display: inline-flex;">
                <img src="./img/logo.png" alt="Try" class="col-7 col-md-4">
                <span class="title-try" style="color:white;">Be the reason someone smiles today</span>
            </div>
            <br><br>
            <p>Bidyanondo (Learn for Fun) is an educational voluntary organization in Bangladesh. The official registration No. is S-12258/2015). Bidyanondo has been running by 40 officers and hundreds of volunteers, whose mission is t...</p>
            <br>
            <a href="#" style="color: #00a78e !important; font-weight: bold;" >READ MORE <i class="fas fa-long-arrow-alt-right"></i></i></a>
            <br>
            <br>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col float-left col-md-2">
            <h5 class="title">VISIT</h5>
            <p>Projects</p>
            <p>Sponsor</p>
            <p>Gallery</p>
            <p>Sign in</p>
        </div>
        <div class="col float-left col-md-2">
            <h5 class="title">HELP</h5>
            <p>FAQ</p>
            <p>Contact us</p>
            <p>About Us</p>
            <p>Volunteers</p>
        </div>
        <div class="col float-left col-md-3">
            <h5 class="title">CONTACT</h5>
            <p><i class="fas fa-map-marker-alt"></i>&nbsp; : House: 13 (1st floor), Road: 2/B, Pallabi R/A, Mirpur,Dhaka- 1216</p>
            <p><i class="fas fa-phone-alt"></i>&nbsp; : +880 1878116234</p>
        </div>
    </div>
    <div class="developed"> <p>Developed <font>&hearts;</font> by <font>Md Monabbor Hossen</font> </p> </div>
</footer>













<script>
    //Get the button
    var mybutton = document.getElementById("hiBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<section>
    <!-- The Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenterTitle">Zakat For COVID-19 Relief Fund</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><font>৳</font> BDT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><font>$</font> USD</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="amount clearfix mb-4">
                                <div class="bdt-5">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="bdt-5">
                                        <label for="bdt-5">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>৳</font> 5,000(Capital for Street Hawker)</span>
                                </div>
                                <div class="bdt-10">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="bdt-10">
                                        <label for="bdt-10">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>৳</font> 10,000 (Seeds-Fertilizer for Farmers) </span>
                                </div>
                                <div class="bdt-18">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="bdt-18">
                                        <label for="bdt-18">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>৳</font> 18,000 (Rickshaw/Van for slum people) </span>
                                </div>
                                <div class="bdt-36">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="bdt-36">
                                        <label for="bdt-36">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>৳</font> 36,000 (Scholarship for Muslim Student) </span>
                                </div>
                                <div class="bdt-60">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="bdt-60">
                                        <label for="bdt-60">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>৳</font> 60,000 (Buying life stock for village woman) </span>
                                </div>
                                <div class="bdt-95">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="bdt-95">
                                        <label for="bdt-95">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>৳</font> 95,000 (Sewing machine for 10 women) </span>
                                </div>
                                <div class="custom">
                                    <div class="bdt float-left">
                                        <input type="radio" name="bdt" id="custom">
                                        <label for="custom">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <input class="ml-2" type="number" placeholder="Custom Amount" name="" id="">
                                </div>
                            </div>
                            <form action="">
                                <textarea name="Comment" id="" cols="30" placeholder="Comments here..." rows="10"></textarea>
                                <button type="submit"><i class="fas fa-money-bill-alt"></i> PAY WITH CARD/MOBILE BANKING/BANK TRANSFER</button>
                                <div class="pay-img">
                                    <img src="./img/pay/ab_direct-sq.png" alt="">
                                    <img src="./img/pay/bankasia-sq.png" alt="">
                                    <img src="./img/pay/bkash-sq.png" alt="">
                                    <img src="./img/pay/citytouch.png" alt="">
                                    <img src="./img/pay/dbbl-nexus-sq.png" alt="">
                                    <img src="./img/pay/dbbl_mobile-sq.png" alt="">
                                    <img src="./img/pay/dmoney.png" alt="">
                                    <img src="./img/pay/ipay.png" alt="">
                                    <img src="./img/pay/islamibank-sq.png" alt="">
                                    <img src="./img/pay/masterc-sq.png" alt="">
                                    <img src="./img/pay/mcash-sq.png" alt="">
                                    <img src="./img/pay/mobilemoney.png" alt="">
                                    <img src="./img/pay/mtb-sq.png" alt="">
                                    <img src="./img/pay/my-cash-sq.png" alt="">
                                    <img src="./img/pay/nogod-logo.png" alt="">
                                    <img src="./img/pay/okwallet-sq.png" alt="">
                                    <img src="./img/pay/paypal.png" alt="">
                                    <img src="./img/pay/sure-cash.png" alt="">
                                    <img src="./img/pay/tapnpay-sq.png" alt="">
                                    <img src="./img/pay/upay.png" alt="">
                                    <img src="./img/pay/visa-sq.png" alt="">
                                    <img src="./img/pay/amx.png" alt="">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="amount clearfix mb-4">
                                <div class="usd-5">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="usd-5">
                                        <label for="usd-5">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>$</font> 61 (Capital for Street Hawker) </span>
                                </div>
                                <div class="usd-10">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="usd-10">
                                        <label for="usd-10">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>$</font> 122 (Seeds-Fertilizer for Farmers)  </span>
                                </div>
                                <div class="usd-18">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="usd-18">
                                        <label for="usd-18">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>$</font> 220 (Rickshaw/Van for slum people) </span>
                                </div>
                                <div class="usd-36">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="usd-36">
                                        <label for="usd-36">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>$</font> 440 (Scholarship for Muslim Student) </span>
                                </div>
                                <div class="usd-60">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="usd-60">
                                        <label for="usd-60">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>$</font> 732 (Buying life stock for village woman) </span>
                                </div>
                                <div class="usd-95">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="usd-95">
                                        <label for="usd-95">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <span class="text"><font>$</font> 1,159 (Sewing machine for 10 women) </span>
                                </div>
                                <div class="custom">
                                    <div class="usd float-left">
                                        <input type="radio" name="usd" id="custom">
                                        <label for="custom">
                                            <i class="fas fa-check" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <input class="ml-2" type="number" value="0" placeholder="Custom Amount" name="" id="">
                                </div>
                            </div>
                            <form action="">
                                <textarea name="Comment" id="" cols="30" placeholder="Comments here..." rows="10"></textarea>
                                <button type="submit"><i class="fas fa-money-bill-alt"></i> PAY WITH CARD/MOBILE BANKING/BANK TRANSFER</button>
                                <div class="pay-img">
                                    <img src="./img/pay/ab_direct-sq.png" alt="">
                                    <img src="./img/pay/bankasia-sq.png" alt="">
                                    <img src="./img/pay/bkash-sq.png" alt="">
                                    <img src="./img/pay/citytouch.png" alt="">
                                    <img src="./img/pay/dbbl-nexus-sq.png" alt="">
                                    <img src="./img/pay/dbbl_mobile-sq.png" alt="">
                                    <img src="./img/pay/dmoney.png" alt="">
                                    <img src="./img/pay/ipay.png" alt="">
                                    <img src="./img/pay/islamibank-sq.png" alt="">
                                    <img src="./img/pay/masterc-sq.png" alt="">
                                    <img src="./img/pay/mcash-sq.png" alt="">
                                    <img src="./img/pay/mobilemoney.png" alt="">
                                    <img src="./img/pay/mtb-sq.png" alt="">
                                    <img src="./img/pay/my-cash-sq.png" alt="">
                                    <img src="./img/pay/nogod-logo.png" alt="">
                                    <img src="./img/pay/okwallet-sq.png" alt="">
                                    <img src="./img/pay/paypal.png" alt="">
                                    <img src="./img/pay/sure-cash.png" alt="">
                                    <img src="./img/pay/tapnpay-sq.png" alt="">
                                    <img src="./img/pay/upay.png" alt="">
                                    <img src="./img/pay/visa-sq.png" alt="">
                                    <img src="./img/pay/amx.png" alt="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

</section>

<script src="./js/jquery.min.js"></script>
<script src="./js/jquery-3.2.1.min.js"></script>
<script src="./js/jquery.easypiechart.min.js"></script>
<script src="./js/jquery-1.0.0.counterup.js"></script>
<script src="./js/owl.carousel.min.js"></script>
<script src="./js/all.min.js"></script>
<script src="./js/fontawesome.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/plugin.js"></script>


</body>
</html>
