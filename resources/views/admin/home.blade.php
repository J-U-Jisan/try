<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/lightbox.min.css">
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
<body style="background: #e4e7e7">

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.html">
        <img src="../images/logo.png" alt="Try" class="col-7 col-md-4">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}">LOGOUT</a>
            </li>
        </ul>
    </div>
</nav>
<section class="help clearfix section-padding mt-5">
    <div class="container">
        <h2>Slider Image Selection</h2>

        @if (session()->has('slider_success'))
            <div class="alert alert-success w-25">
                <strong>{{ session('slider_success') }}</strong>
            </div>
        @endif
        @if (session()->has('slider_fail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('slider_fail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.slider') }}" enctype="multipart/form-data">
            @csrf
            <label>Select Image:</label>
            <input type="file" accept="image/*" name="slider" class="form-control w-25 p-1"required>
            <input type="submit" class="mt-2 p-1 btn-success" name="submit" value="Upload">
        </form>

        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Image List: </p>
            </div>
            <div  class="mt-2">
                <hr class="m-1">
                @foreach($sliders as $slider)
                    <div class="row">

                        <div class="ImageContainer col-md-1">
                            <a data-lightbox="mygallery" href="{{ asset('storage/slider/'.$slider->name) }}">
                                <img src="{{ asset('storage/slider/'.$slider->name) }}" alt="..." class="img-fluid" style="width: 1000px !important; height: 60px !important;">
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.slider.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <div class="col-md-12 ml-5">
                                <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                            </div>
                        </form>
                    </div>
                    <hr class="m-1">
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="help clearfix">
    <div class="container pb-5">
        <div>
            <h2>Notice</h2>
        </div>
        @if (session()->has('notice_success'))
            <div class="alert alert-success w-25">
                <strong>{{ session('notice_success') }}</strong>
            </div>
        @endif
        @if (session()->has('notice_fail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('notice_fail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.notice') }}" enctype="multipart/form-data">
            @csrf
            <label>Enter Title:</label>
            <input type="text" name="title" class="form-control col-md-4 p-2 mb-2" placeholder="Enter title"required>
            <label>Select File:</label>
            <input type="file" name="notice" class="form-control col-md-4 p-1" required>
            <input type="submit" name="submit" value="UPLOAD" class="form-control btn-success mt-3 col-md-1">
        </form>
        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Notice List: </p>
            </div>
            <div  class="w-100 mt-2">
                <hr class="m-1">
                @foreach($notices as $notice)
                    <div class="col-md-12">
                        <div class="col-md-2 float-left">
                            <a href="{{ asset('storage/notice/'.$notice->name) }}">{{ $notice->name }}</a>
                        </div>
                        <form method="POST" action="{{ route('admin.notice.edit') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $notice->id }}">
                            <div class="col-md-3 float-left ml-4">
                                <input type="text" name="title" class="form-control" required value="{{ $notice->title }}">
                            </div>
                            <div class="col-md-1 float-left ml-4">
                                <input type="submit" name="submit" value="EDIT" class="form-control btn btn-success">
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.notice.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $notice->id }}">
                            <div class="col-md-1 ml-5 float-left">
                                <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <br>
                    <hr class="mb-5">
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="help clearfix">
    <div class="container pb-5">
        <div class="row">
            <h2>Embed Video</h2>
            <sub><h5 class="font-italic pt-2"> &nbsp(2 Video)</h5></sub>
        </div>
        @if (session()->has('videoFail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('videoFail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.video') }}">
            @csrf
            <label>Enter Link:</label>
            <input type="text" name="video" class="form-control col-md-4 p-2" placeholder="Enter Embedded Link"required>
            <input type="submit" name="submit" value="UPLOAD" class="form-control btn-success mt-3 col-md-1">
        </form>
        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Videos: </p>
            </div>
            <div  class="mt-2">
                <hr class="m-1">
                @foreach($videos as $video)
                <div class="row">
                    <div class="col-md-5">
                        <iframe class="col-md-8"src="{{ $video->link }}"
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                    <form method="POST" action="{{ route('admin.video.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $video->id }}">
                        <div class="col-md-12 ml-5 mt-5">
                            <button type="submit" class="btn form-control bg-danger text-white" onclick="if (!confirm('Are you sure?')) { return false }">DELETE</button>
                        </div>
                    </form>
                </div>
                <hr class="m-1">
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="help clearfix">
    <div class="container">
        <h2>Partner</h2>

        @if (session()->has('videoFail'))
            <div class="alert alert-danger w-25">
                <strong>{{ session('videoFail') }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.video') }}">
            @csrf
            <label>Enter Name:</label>
            <input type="text" name="name" class="form-control col-md-4 p-2 mb-2" placeholder="Enter Name" required>
            <label>Select Logo:</label>
            <input type="file" name="logo" class="form-control col-md-4" accept="image/*" required>
            <input type="submit" name="submit" value="UPLOAD" class="form-control btn-success mt-3 col-md-1">
        </form>
        <div class="mt-3">
            <div>
                <p style="font-size: 20px;">Videos: </p>
            </div>
            <div  class="mt-2">
                <hr class="m-1">

            </div>
        </div>
    </div>
</section>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/lightbox-plus-jquery.min.js"></script>
</body>
</html>
