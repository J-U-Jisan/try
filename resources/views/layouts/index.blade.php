<!DOCTYPE html>
<html lang="en">

@include('head')

<body  onload="changeClass()">

<div class="loader">
    <img src="{{ asset('images/loading.gif') }}" alt="loading...">
</div>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Try" class="col-6 col-md-3">
        <span class="title-try">Be the reason someone smiles today</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @guest
        <?php $length = 0; ?>
    @else
        <?php
            $length = strlen(Auth::user()->name);
        ?>
    @endguest
    <div class="collapse navbar-collapse" style="transform: {{ $length>10?'translateX(21%)':'translateX(25%)' }};" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ml-2">
                <a class="nav-link" href="{{ route('welcome') }}">HOME</a>
            </li>

            <li class="nav-item dropdown ml-2">
                <a class="nav-link dropdown-toggle" href="{{ route('event') }}" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EVENT
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('event').'#upcoming' }}">Upcoming </a><hr>
                    <a class="dropdown-item" href="{{ route('event').'#ongoing' }}">On Going</a><hr>
                    <a class="dropdown-item" href="{{ route('event').'#closed' }}">Closed</a>
                </div>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="{{ route('donation') }}">DONATION</a>
            </li>

            <li class="nav-item ml-2">
                <a class="nav-link" href="{{ route('partner') }}">SPONSORS</a>
            </li>
            <li class="nav-item ml-2">
                <a class="nav-link" href="{{ route('blog') }}">BLOG</a>
            </li>
            <li class="nav-item dropdown ml-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ABOUT
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('history') }}">History</a><hr>
                    <a class="dropdown-item" href="{{ route('welcome').'#mission' }}">Mission & Vission</a><hr>
                    <a class="dropdown-item" href="{{ route('member') }}">Member</a>
                </div>
            </li>
            @guest
            <li class="nav-item ml-2">
                <button class="btn btn-outline-dark bg-transparent px-2 py-0"><a class="nav-link" href="{{ route('login') }}">Sign In</a></button>
            </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: blue;" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a><hr>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

@yield('content')

<div class="fixed-bottom">
    <div class="scroll-top float-left">
        <button onclick="topFunction()" id="hiBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>
    </div>
</div>


@include('footer')
@include('script')

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="1590502034512735"
     theme_color="#00A78E">
</div>
</body>
</html>
