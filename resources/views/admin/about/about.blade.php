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
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
</head>
<body>
<!-- banner -->
<!-- technology-left -->
<div class="technology">
    <div style="padding-left: 95px; padding-bottom: 20px;"><a href="{{url('admin/editAbout')}}"><i class="fa fa-plus"></i>修改关于我</a></div>
    <div class="container">

        <div class="col-md-9 technology-left">
            <div class="w3agile-1">
            @foreach($data as $v)
                <div class="welcome">
                    <div class="welcome-top heading">
                        <h2 class="w3">{{$v->ab_title}}</h2>
                        <div class="welcome-bottom">
                            <img src="{{$v->ab_image}}" class="img-responsive" alt="">
                            {{$v->ab_content}}
                        </div>
                    </div>
                </div>
             @endforeach
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right">


            <div class="blo-top1">

            </div>


        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
</div>

</body>
</html>