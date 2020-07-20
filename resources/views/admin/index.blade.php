<!DOCTYPE html>
<html lang="en">

@include('head')

<body style="background: #e4e7e7">

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('admin') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Try" class="col-7 col-md-4">
        <span class="title-try">Be the reason someone smiles today</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="transform: translateX(45%);" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin') }}">HOME</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('admin.event') }}" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EVENT
                </a>
                <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.event').'#upcoming' }}">Upcoming </a><hr>
                    <a class="dropdown-item" href="{{ route('admin.event').'#ongoing' }}">On Going</a><hr>
                    <a class="dropdown-item" href="{{ route('admin.event').'#closed' }}">Closed</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.partner') }}">SPONSORS</a>
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
                    <a class="dropdown-item" href="{{ route('admin.member') }}">Member</a><hr>
                    <a class="dropdown-item" href="#work">How it works</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}">LOGOUT</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

@include('script')
</body>
</html>


