<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Form Layouts</title>

  <link href="/resources/views/student/style/css/style.css" rel="stylesheet">
  <link href="/resources/views/student/style/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/resources/views/student/style/js/html5shiv.js"></script>
  <script src="/resources/views/student/style/js/respond.min.js"></script>

  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="../index/index.html"><img src="images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="../index/index.html"><img src="images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            @include('layouts.studentLeft')
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        @include('layouts.studentHead')
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Forms Layouts
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Forms</a>
                </li>
                <li class="active"> Forms Layouts </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-6" style="width: 930px">
                <section class="panel">
                    <header class="panel-heading">
                       班级分类添加
                    </header>
                    <div class="panel-body">
                        <form  id="formdata" action="" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}


                            <div class="form-group">
                                <label for="exampleInputEmail1">分类</label>
                                <input style="width: 300px" type="text" name="class_name" class="form-control"  placeholder="班级名称">
                            </div>



                            <button type="button" id="btn" class="btn btn-primary">提交</button>
                        </form>

                    </div>
                </section>
            </div>

        </div>

        <!-- page end-->
        </section>
        <!--body wrapper end-->

        <!--footer section start-->
        {{--<footer>
            2014 &copy; AdminEx by <a href="http://www.mycodes.net/" target="_blank">源码之家</a>
        </footer>--}}
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/resources/views/student/style/js/jquery-1.10.2.min.js"></script>
<script src="/resources/views/student/style/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/resources/views/student/style/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/resources/views/student/style/js/bootstrap.min.js"></script>
<script src="/resources/views/student/style/js/modernizr.min.js"></script>
<script src="/resources/views/student/style/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/resources/org/layer/layer.js"></script>

<!--common scripts for all pages-->
<script src="/resources/views/student/style/js/scripts.js"></script>
<script>
    $(function () {
        $('#btn').click(function () {
            var formdata = new FormData($('#formdata')[0]);
            $.ajax({
                url:'{{url('student/addClass')}}',
                type:'post',
                data:formdata,
                contentType:false,
                processData:false,
                success:function (data) {
                    if (data.state==100){
                        layer.alert(data.msg, {icon: 5,})
                    }
                    if (data.state==200){
                        layer.msg(data.msg);
                    }
                }
            })
        })
    })

</script>

</body>
</html>
