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
    <link href="/resources/views/home/css/register/style.css" rel='stylesheet' type='text/css' />
    <script src="/resources/views/home/js/jquery-1.11.1.min.js"></script>
    <script src="/resources/views/home/js/jquery.min.js"></script>
    <script src="/resources/views/home/js/jquery.easing.min.js"></script>
    <script src="/resources/views/home/js/bootstrap.min.js"></script>
    <!-- animation-effect -->
    <link href="/resources/views/home/css/animate.min.css" rel="stylesheet">
    <script src="/resources/views/home/js/wow.min.js"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var k=!0;

            $(".loginmask").css("opacity",0.8);

            if($.browser.version <= 6){
                $('#reg_setp,.loginmask').height($(document).height());
            }

            $(".thirdlogin ul li:odd").css({marginRight:0});

            $(".openlogin").click(function(){
                k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
            });

            $(".loginmask,.closealert").click(function(){
                k&&(k=!1,$("#loginalert").animate({top:-600},400,"easeOutQuart",function(){$("#loginalert").hide();k=!0}),$(".loginmask").fadeOut(500))
            });


            $("#sigup_now,.reg a").click(function(){
                $("#reg_setp,#setp_quicklogin").show();
                $("#reg_setp").animate({left:0},500,"easeOutQuart")
            });

            $(".back_setp").click(function(){
                "block"==$("#setp_quicklogin").css("display")&&$("#reg_setp").animate({left:"100%"},500,"easeOutQuart",function(){$("#reg_setp,#setp_quicklogin").hide()})
            });

        });
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
                            <li class="openlogin"><a href="javascript:void(0);">登录</a></li>
                            <li class="reg"><a href="javascript:void(0);">注册</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div id="loginalert">

    <div class="pd20 loginpd">
        <h3><i class="closealert fr"></i><div class="clear"></div></h3>
        <div class="loginwrap">
            <div class="loginh">
                <div class="fl">会员登录</div>
                <div class="fr">还没有账号<a id="sigup_now" href="javascript:void(0);">立即注册</a></div>
            </div>
            <h3><span class="fl">邮箱登录</span><span class="login_warning">用户名或密码错误</span><div class="clear"></div></h3>
            <form action="" method="post" id="login_form">
                <div class="logininput">
                    <input type="text" name="username" class="loginusername" value="" placeholder="邮箱/用户名" />
                    <input type="text" class="loginuserpasswordt" value="" placeholder="密码" />
                    <input type="password" name="password" class="loginuserpasswordp" style="display:none" />
                </div>
                <div class="loginbtn">
                    <div class="loginsubmit fl"><input type="submit" value="登录" class="btn" /></div>
                    <div class="fl" style="margin:26px 0 0 0;"><input id="bcdl" type="checkbox" checked="true" />保持登录</div>
                    <div class="fr" style="margin:26px 0 0 0;"><a href="http://www.xwcms.net/">忘记密码?</a></div>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>
</div><!--loginalert end-->


<div id="reg_setp">
    <div class="back_setp">返回</div>
    <div id="setp_quicklogin">
        <div class="loginwrap" style="margin: -208px auto;">
            <div class="loginh">
                <div class="fl">会员登录</div>
                <div class="fr">还没有账号<a id="sigup_now" href="javascript:void(0);">立即注册</a></div>
            </div>
            <h3><span class="fl">邮箱登录</span><span class="login_warning">用户名或密码错误</span><div class="clear"></div></h3>
            <form action="" method="post" id="login_form">
                <div class="logininput">
                    <input type="text" name="username" class="loginusername" value="" placeholder="邮箱/用户名" />
                    <input type="text" class="loginuserpasswordt" value="" placeholder="密码" />
                    <input type="password" name="password" class="loginuserpasswordp" style="display:none" />
                </div>
                <div class="loginbtn">
                    <div class="loginsubmit fl"><input type="submit" value="登录" class="btn" /></div>
                    <div class="fl" style="margin:26px 0 0 0;"><input id="bcdl" type="checkbox" checked="true" />保持登录</div>
                    <div class="fr" style="margin:26px 0 0 0;"><a href="http://www.xwcms.net/">忘记密码?</a></div>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>
</div><!--reg_setp end-->

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