<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <!--My style-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe&display=swap" rel="stylesheet">

    <title>{{ $title }}</title>

    <!--fullCalender-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <!--style-->
    <style>
            .profile-left {
                padding-left: 40px;
                padding-top: 70px;
            }

            .profile-right {
                padding-right: 40px;
                padding-left: 40px;
            }

            hr {
                margin-bottom: 15px;
            }

            .wo-profile {
                padding-bottom: 50px;
            }

            .awards h4 {
                padding-top: 70px;
            }

            li {
                list-style: none;
            }

            .member {
                padding-left: 50px;
            }

            .member img {
                margin-top: 20px;
            }

            .member img:hover {
                box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.15);
            }

            .member button {
                background-color: transparent;
            }

            .modal {
                padding-top: 6%;
            }

            .modal-detail p, .modal-detail h1, .modal-detail h4{
                color: white;
            }

            .modal-detail {
                margin-top: 12%;
                margin-left: 80px;
            }


            .awards li, .filmography li, .wo-profile p{
                font-family: 'Alumni Sans Pinstripe', sans-serif;
                font-size: 20px;
                font-weight: bold;
            }

            .filmography {
                margin-top: 54px;
            }

            .nav-footer-e-gate {
                position: relative;
                bottom: 0;
                margin-right: 35px;
            }

            .footer-line {
                margin-top: 200px;
            }

            .nav-foot {
                margin-right: 10px;
            }

            ::-webkit-scrollbar-thumb {
                background: rgba(90, 90, 90);
            }
            
            ::-webkit-scrollbar-track {
                background: transparent;
            }

            .discography {
                margin-top: 7%;
                margin-bottom: 1%;
            }

            .album {
                margin-left: 27%;
            }

            .carousel-caption {
                top: 0;
                margin-left: 100px;
            }

            .carousel-caption button {
                margin-left: 80%;
                margin-bottom: 20px;
                border-radius: 40px;
                padding: 7px 20px 7px 20px;
                border: none;
                background-color: rgba(0,0,0,0.7);
                color: white;
            }

            .modal-content {
                margin-left: 125px;
                background-color: transparent;
            }

            .offcanvas {
                background-color: rgba(0, 0, 0, 0.85);
                color: white;
                width: 70%;
                height: 50%;
                margin-bottom: 10%;
                margin-left: 15%;
            }

            /* .detail-canvas .offcanvas {
                margin-bottom: 30%;
            } */

            .detail-canvas .offcanvas-title, .detail-canvas .offcanvas-body {
                margin-left: 30px;
                margin-right: 30px;
                margin-top: 10px;
            }

            .video-canvas .offcanvas, .audio-canvas .offcanvas, .detail-canvas .offcanvas {
                width: 1000px;
                height: 640px;
                margin-bottom: 0;
                margin-left: 13%;
            }

            /* .audio-canvas .offcanvas {
                height: 500px;
                border: none;
            } */

            .audio-canvas th, .audio-canvas td {
                color: white
            }

            .audio-canvas table{
                border: rgba(148, 144, 144, 0.15);
                margin-top:10px;
                margin-left: 5%;
                width: 90%;
            }
            .audio-canvas table > thead > tr > th{
                border:1px solid rgba(0, 0, 0, 0.15);
                border-top: none;
            }
            .audio-canvas table > tbody > tr > td{
                border:1px solid rgba(148, 144, 144, 0.15);
                border-left: none;
                border-right: none;
            }

            .navbar .nav-item .dropdown-menu { 
                display: none; 
            }

            .navbar .nav-item:hover .dropdown-menu { 
                display: block;
            }
                
            .navbar .nav-item .dropdown-menu { 
                margin-top:0; 
                border: none;
            }

            .ot11 {
                margin-top: 150px;
            }

            .dropdown-menu a:active {
                color: white;
                background-color: black;
            }

            .nav-pills .nav-link {
                display: flex;
                color: white;
                background-color: black;
                font: 200;
                border: 12px;
                font-family: 'Ubuntu', sans-serif;
                font-size: 9px;
                box-shadow: 46px;
            }

            .nav-pills .nav-link:hover {
                color: black;
                background-color: white;
            }

            .nav-pills {
                display: flex;
                justify-content: center;
            }

            .nav-pills .nav-item {
                margin-left: 10px;
                margin-bottom: 10px;
            }

            .nav-pills .nav-item a {
                position: flex;
                border-radius: 455px;
                border: 12px
            }

            .nav-pills .nav-item a::before {
                display: none;
            }

            .ot11 {
                background-color: black;
                padding-top: 10px;
                border-radius: 40px;
                margin-left: 25px;
                margin-right: 25px;
                margin-bottom: 43px;
            }

            .name {
                margin-top: 100px;
                margin-bottom: 120px;
            }

            .nav-pills .active a {
                background-color: white;
                color: black;
            }

            .photo {
                width: 300px;
                height: 300px;
                object-fit: cover;
                display: flex;
                margin-top: 12px;
                margin-left: 40px;
                margin-bottom: 45px;
            }

            .photo-pagination {
                margin-top: 120px;
            }

            .pagination a {
                color: white;
                background-color: black;
                border: none;
                border-radius: 0px
            }

            .pagination a:hover {
                color: black;
            }

            .pagination .active span {
                color: black;
                background-color: white;
                border: none;
            }

            .calendar {
                margin-top: 150px;
            }

            .fc-state-default.fc-corner-left {
                border-top-left-radius: 1px;
                border-bottom-left-radius: 1px;
            }

            .fc-state-default.fc-corner-right {
                border-top-right-radius: 1px;
                border-bottom-right-radius: 1px;
            }

            .fc-state-default {
                background-color: #020202;
                background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0e0d0d), to(#020000));
                background-image: -webkit-linear-gradient(top, #30bd48, #29c714);
                background-image: -o-linear-gradient(top, #2e22db, #1469ca);
                background-image: linear-gradient(to bottom, #181718, #3d3c3d);
                background-repeat: repeat-x;
                border-color: none;
                /* border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); */
                border-color: none;
                color: rgb(253, 251, 251);
                text-shadow: 0 1px 1px rgb(255 255 255 / 75%);
                /* box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%); */
                box-shadow: inset 0 1px 0 rgb(0 0 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%);
            }

            .fc-content {
                background-color: rgb(255, 255, 255);
            }

            .fc-title {
                color: black;
            }

            .fc-content span {
                color: rgb(0, 0, 0);
                background-color: white;
            }

            .fc-event, .fc-event-dot {
                background-color: white;
            }

            .fc-event {
                border: none;
            }

            .fc-bg {
                background-color: black;
                color: white;
            }

            .activity-schedule {
                width: 70%;
                margin-left: 180px;
                margin-bottom: 34px;
            }

            .fc-unthemed th, .fc-unthemed td, .fc-unthemed thead, .fc-unthemed tbody, .fc-unthemed .fc-divider, .fc-unthemed .fc-row, .fc-unthemed .fc-content, .fc-unthemed .fc-popover, .fc-unthemed .fc-list-view, .fc-unthemed .fc-list-heading td {
                border-color: rgba(255, 255, 255, 0.15);
            }

            .fc-day-number {
                color: white
            }

            .fc {
                text-align: center;
            }

            .fc-today {
                color: black;
            }

            .fc-unthemed td.fc-today {
                background: #29272767;
            }

            .fc-widget-content {
                color: white;
            }

            .fc-center {
                margin-top: 60px;
                margin-bottom: 40px;
            }

    </style>


</head>
<body>

    @yield('content')

    @include('partials.navbar')

    @yield('container')

    @include('partials.footer')

    @yield('jsscript')

    <script src="js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>