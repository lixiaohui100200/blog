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
    <link href="/resources/views/home/css/style.css" rel='stylesheet' type='text/css' />
    <script src="/resources/views/home/js/jquery-1.11.1.min.js"></script>
    <script src="/resources/views/home/js/bootstrap.min.js"></script>
    <!-- animation-effect -->
    <link href="/resources/views/home/css/animate.min.css" rel="stylesheet">
    <script src="/resources/views/home/js/wow.min.js"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
    <style>
        #contact_id {
             background: #fa4b2a;
             border: none;
             padding: 1em 0;
             width: 40%;
             font-size: 0.95em;
             color: #fff;
             letter-spacing: 0.5px;
             outline: none;
             transition: .5s all;
             -webkit-transition: .5s all;
             -moz-transition: .5s all;
             -o-transition: .5s all;
             -ms-transition: .5s all;
         }

        #comment_id{
            background: #fa4b2a;
            border: 1px solid #fa4b2a;
            padding: .8em 0;
            width: 30%;
            margin-top: .5em;
            font-size: 15px;
            color: #fff;
            letter-spacing: 0.5px;
            outline: none;
            transition: .5s all;
            -webkit-transition: .5s all;
            -moz-transition: .5s all;
            -o-transition: .5s all;
            -ms-transition: .5s all;
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="header" id="ban">
    <div class="container">
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
                            <li @if($_SERVER['REQUEST_URI']=='/') class="active act" @endif><a href="{{url('/')}}">首页</a></li>
                            <li @if($_SERVER['REQUEST_URI']=='/about') class="active act" @endif><a href="{{url('/about')}}">关于</a></li>
                            @foreach($cate as $v)
                            <li @if($_SERVER['REQUEST_URI']=='/features/'.$v->cate_id) class="active act" @endif><a href="{{url('/features').'/'.$v->cate_id}}">{{$v->cate_name}}</a></li>
                            @endforeach
                            <li @if($_SERVER['REQUEST_URI']=='/contact') class="active act" @endif><a href="{{url('/contact')}}">联系</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--start-main-->
<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <h1><a href="{{url('/')}}">GATLIN BLOG</a></h1>
            <p><label class="of"></label>冒蓝光的哒！哒！哒！哒！哒。。。<label class="on"></label></p>
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