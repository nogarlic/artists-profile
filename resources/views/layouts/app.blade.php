<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <!--My style-->
    <link rel="stylesheet" href="css\dashboard.css">
    {{-- <link rel="stylesheet" href="css\style.css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe&family=Antonio:wght@100;400&family=Bebas+Neue&family=Hind+Siliguri&family=Kanit:wght@300&family=Raleway:wght@300&family=Share&family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
        }
    </style>

    <!--js-->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>

        body {
            font-family: 'Hind Siliguri', sans-serif;
            transition-delay: .7s;
        }

        .forum-wo-brand {
            margin-top: 30px;
            margin-left: 45px;
        }

        #login-box, #register-box {
            margin-top: 100px;
            margin-bottom: 30px;
        }

        .card {
            background-color: black;
        }

        .card-header {
            background-color: white;
        }

        .card-body {
            color: white;
        }

        .card-body button:hover {
            background-color: white;
            color: black;
            border: black;
        }

        .card-body button {
            color: white;
            background-color: black;
            border: 1px solid white;
        }

        .card-body a {
            color: white;
        }

        .card-body a:hover {
            color: rgba(255, 255, 255, 0.7)
        }

        .in-forum a {
            color: black;
        }

        .in-forum a:hover {
            color: rgba(0, 0, 0, 0.7)
        }

        .verify-box {
            margin-top: 20%;
        }

        .verify-request button {
            border: none;
        }

        .verify-request button:hover {
            text-decoration: none;
        }

        .sidebar {
            padding-top: 30px;
        }

        .sidebar img {
            margin-left: 45px;
            margin-bottom: 40px;
        }

        .sidebarMenu {
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-top: none;
        }

        .sidebarMenu-content {
            margin-left: 35px;
            font-size: 20px;
        }

        #sidebarMenu .nav-item:hover {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 40px;
            color: black;
            margin-right: 45px;
        }

        #sidebarMenu .active {
            font-weight: bolder;
            color: black;
        }

        .sidebar-logout {
            margin-right: 90px;
            border-radius: 40px;
            margin-top: 100px;
        }

        .sidebar-logout a {
            color: black;
            text-decoration: none;
        }

        .sidebar-logout:hover {
            background-color: white;
        }

        .navbar-brand {
            background-color: transparent;
            border: none;
        }

        .other-posts {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-left: none;
        }

        .dashboard-navbar p {
            font-size: 20px;
            font-weight: bold;
            margin-top: 4px;
            margin-left: 16px;
            margin-bottom: 0;
        }

        .dashboard-navbar {
            backdrop-filter: blur(6px); 
        }

        .dashboard-navbar-full {
            padding: 0;
        }

        .dashboard-navbar a {
            color: black;
            text-decoration: none;
        }

        .post {
            margin-bottom: 50px;
        }

        ::-webkit-scrollbar-thumb {
                background: rgba(90, 90, 90);
        }
            
        ::-webkit-scrollbar-track {
            background: transparent;
        }

        .post-single {
            padding-left: 20px;
            padding-top: 20px;
            padding-right: 4px;
            border: 1px solid rgba(224, 224, 224, 0.316);
            border-right: none;
            border-left: none;
            padding-bottom: 20px;
        }

        .post-single p {
            padding: 0;
            margin: 0;
        }

        .post-single a {
            color: black;
            text-decoration: none;
        }

        .post-single p strong, .post-single p span {
            font-size: 16px;
        }

        .post-single p span {
            color: gray;
        }

        .post-single:hover {
            background-color: rgba(216, 216, 216, 0.4)
        }

        .vote-s {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 5px;
        }

        .vote {
            margin-top: 10px;
        }

        .profile-photo {
            margin-left: 35px;
            position: relative;
            margin-top: 57px;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .header-layout {
            position: absolute;
            object-fit: cover;
        }

        .back-btn {
            margin-right: 4px;
        }

        .new-post {
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .new-post button {
            border: 1px solid white;
            color: white;
            background-color: black;
            border-radius: 40px;
            margin: 0;
            padding: 3px;
            display: flex;
            justify-content: end;
        }

        .new-post button:hover{
            color: black;
            border: 1px solid black;
            background-color: white;
        }

        .photo-home {
            margin-left: 10px;
            margin-top: 10px;
            object-fit: cover;
        }

        .form-new-post {
            border: none;
        }

        .img-in {
            margin-right: 20px;
            font-size: 24px;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
        content: 'Add Image';
        display: inline-flex;
        justify-content: end;
        background: linear-gradient(top, #f9f9f9, #e3e3e3);
        border: 1px solid #999;
        border-radius: 3px;
        padding: 5px 8px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        text-shadow: 1px 1px #fff;
        font-weight: 700;
        font-size: 10pt;
        }

        .custom-file-input:hover::before {
        border-color: black;
        }

        .custom-file-input:active::before {
        background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }

        .create-btn {
            margin-right: 23px;
        }

        .create-btn button {
            padding: 5px;
        }
        
        .image-post img {
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 34px;
        }

        .vote button {
            border: none;
            background-color: transparent;
            color: grey;
            margin-right: 20px;
            font-size: 30px;
        }

        .vote .dropdown-menu button, .vote .dropdown-menu a {
            border: none;
            background-color: transparent;
            color: rgb(0, 0, 0);
            margin-right: 20px;
            font-size: 16px;
        }

        .vote .dropdown-menu button:hover {
            background-color: rgba(224, 224, 224, 0.316);
        }

        .profile-edit button {
            margin-left: 200px;
            background-color: black;
            border-radius: 40px;
            color: white;
        }

        .profile-edit button:hover {
            background-color: white;
            border: 1px solid black;
            color: black;
        }

        .input-text {
            width: 80%;
            margin-top: 10px;
            margin-left: 20px;
        }

        .body-post {
            margin-top: 20px;
            margin-left: 10px;
        }

        .update-btn {
            margin-bottom: 45px;
        }

        .update-btn button {
            border: 1px solid white;
            background-color: black;
            color: white;
            border-radius: 40px;
            margin-top: 40px
        }

        .update-btn button:hover{
            border: 1px solid black;
            background-color: white;
            color: black;
        }

        .user-layout {
            margin-bottom: 45px;
        }

        .nav-item a {
            color: black;
        }

        .nav-item a:hover {
            font-weight: bold;
            color: black;
        }

        .bi-hand-thumbs-up:hover {
            color: blue;
        }

        .bi-hand-thumbs-down:hover {
            color: red;
        }

        .reply-box {
            display: none;
        }

        .reply-button {
            cursor: pointer;
        }


    </style>

</head>
<body>
    <div id="app">
    @if (isset($title))

        @include('layouts.sidebar')

    {{-- <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} mine
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav> --}}
    @else
        
    @endif

    @yield('content')
</div>


<script>
        var body = document.getElementById('dashboard-navbar');
        body.style.backgroundColor = 'white';

        // trigger this function every time the user scrolls
        window.onscroll = function (event) {
            var scroll = window.pageYOffset;
            if (scroll >= 300) {
                body.style.backgroundColor = 'rgba(255,255,255,0.8)';
            }
        }


        // $(function(){
        //     $(".vote-s").click(function(){
        //         console.log('OK');
        //         var count = parseInt($("~ .count", this).text());
        //         console.log(count);
                
        //         if($(this).hasClass("upvote")) {
        //             var count = count + 1;
        //             $("~ .count", this).text(count);
        //         } else {
        //             var count = count - 1;
        //             $("~ .count", this).text(count);     
        //         }
                
        //         // $(this).parent().addClass("bump");
                
        //         // setTimeout(function(){
        //         // $(this).parent().removeClass("bump");    
        //         // }, 400);
        //     });
        // });

        // $('#votedown').hover(
        //     function(){ $(this).addClass('bi-hand-thumbs-down-fill') },
        //     function(){ $(this).removeClass('bi-hand-thumbs-down-fill') },
        // )

        // $('#votedown').hover(
        //     function(){ $(this).removeClass('bi-hand-thumbs-down') },
        //     function(){ $(this).addClass('bi-hand-thumbs-down') },
        // )

        // $('#voteup').hover(
        //     function(){ $(this).addClass('bi-hand-thumbs-up-fill uwu') },
        //     function(){ $(this).removeClass('bi-hand-thumbs-up-fill uwu') },
        // )

        // $('#voteup').hover(
        //     function(){ $(this).removeClass('bi-hand-thumbs-up') },
        //     function(){ $(this).addClass('bi-hand-thumbs-up') },
        // )

</script>
    
    {{-- <script src="js/script.js"></script> --}}
    <script src="js/dashboard.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>
