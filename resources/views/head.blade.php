<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="2Z2M_-afkV2N2gbf4AGrvhjgOIvoSEoYm7Z9SRJnvgo" />
    <!-- Primary Meta Tags -->
    <title>@yield('title') Try</title>
    <meta name="title" content="@yield('meta_title','Try')">
    <meta name="description" content="@yield('description','TRY, a volunteer organization made by KUETians with an indomitable desire and mentality
        to stand beside people.')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('meta_title','Try')">
    <meta property="og:description" content="@yield('description','TRY, a volunteer organization made by KUETians with an indomitable desire and mentality
        to stand beside people.')">
    <meta property="og:image" content="@yield('image', asset('images/logo.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('meta_title','Try')">
    <meta property="twitter:description" content="@yield('description','TRY, a volunteer organization made by KUETians with an indomitable desire and mentality
        to stand beside people.')">
    <meta property="twitter:image" content="@yield('image', asset('images/logo.png'))">


    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset( 'css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
        @media (max-width: 567px) {
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
