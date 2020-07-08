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
    <link rel="stylesheet" href="./css/style1.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

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
                <a class="nav-link" href="{{ route('welcome') }}">HOME</a>
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
                <a class="nav-link" href="{{ route('sponsor') }}">SPONSORS</a>
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
                    <a class="dropdown-item" href="{{ route('welcome').'#mission' }}">Mission & Vission</a><hr>
                    <a class="dropdown-item" href="#">Member</a><hr>
                    <a class="dropdown-item" href="#work">How it works</a>
                </div>
            </li>
            <li class="nav-item">
                <button class="border-dark bg-transparent"><a class="nav-link" href="/">Sign In</a></button>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

@include('footer')
@include('script')
</body>
</html>
