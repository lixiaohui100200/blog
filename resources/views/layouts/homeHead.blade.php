<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="/resources/views/home/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    {{--<link href='http://fonts.useso.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>--}}
    <link href="/resources/views/home/css/style.css" rel='stylesheet' type='text/css' />
    <script src="/resources/views/home/js/jquery-1.11.1.min.js"></script>
    <script src="/resources/views/home/js/bootstrap.min.js"></script>
    <!-- animation-effect -->
    <link href="/resources/views/home/css/animate.min.css" rel="stylesheet">
    <script src="/resources/views/home/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
</head>
<body>
<div class="header" id="ban">
    <div class="container">
        <div class="head-left wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
            <div class="header-search">
                <div class="search">
                    <input class="search_box" type="checkbox" id="search_box">
                    <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                    <div class="search_form">
                        <form action="#" method="post">
                            <input type="text" name="Search" placeholder="Search...">
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="link-effect-7" id="link-effect-7">
                        <ul class="nav navbar-nav">
                            <li @if($_SERVER['REQUEST_URI']=='/') class="active act" @endif><a href="{{url('/')}}">Home</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/about') class="active act" @endif><a href="{{url('/about')}}">About</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/features') class="active act" @endif><a href="{{url('/features')}}">Features</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/travel') class="active act" @endif><a href="{{url('/travel')}}">Travel</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/fashion') class="active act" @endif><a href="{{url('/fashion')}}">Fashion</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/music') class="active act" @endif><a href="{{url('/music')}}">Music</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/codes') class="active act" @endif><a href="{{url('/codes')}}">Codes</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/contact') class="active act" @endif><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
            <ul>
                <li><a href="#"> </a></li>
                <li><a href="#" class="pin"> </a></li>
                <li><a href="#" class="in"> </a></li>
                <li><a href="#" class="be"> </a></li>

                <li><a href="#" class="vimeo"> </a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--start-main-->
<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <h1><a href="index.html">STYLE BLOG</a></h1>
            <p><label class="of"></label>LET'S MAKE A PERFECT STYLE<label class="on"></label></p>
        </div>
    </div>
</div>
@if($_SERVER['REQUEST_URI']=='/')
<div class="banner">
    <div class="container">
        <h2>Contrary to popular belief, Lorem Ipsum simply</h2>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        <a href="singlepage.html">READ MORE</a>
    </div>
</div>
    @else
    <div class="banner-1">

    </div>
    @endif