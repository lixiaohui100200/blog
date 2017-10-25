<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Form Advanced Components</title>

    <!--ios7-->
    <link rel="stylesheet" type="text/css" href="/resources/views/student/style/js/ios-switch/switchery.css" />

    <!--icheck-->
    <link href="/resources/views/student/style/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/minimal/red.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/minimal/green.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/minimal/yellow.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/minimal/purple.css" rel="stylesheet">

    <link href="/resources/views/student/style/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/square/green.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/square/blue.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/square/yellow.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/square/purple.css" rel="stylesheet">

    <link href="/resources/views/student/style/js/iCheck/skins/flat/grey.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/flat/red.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/flat/blue.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/flat/yellow.css" rel="stylesheet">
    <link href="/resources/views/student/style/js/iCheck/skins/flat/purple.css" rel="stylesheet">

    <!--multi-select-->
    <link rel="stylesheet" type="text/css" href="/resources/views/student/style/js/jquery-multi-select/css/multi-select.css" />

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
                Advanced Components
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Forms</a>
                </li>
                <li class="active"> Advanced Components </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">


            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Multiple Select
                              <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                        <form action="#" class="form-horizontal ">
                            <div class="form-group last">
                                <label class="control-label col-md-3">添加学生到分组</label>
                                <div class="col-md-9">
                                <select name="country" class="multi-select" multiple="" id="my_multi_select3">
                                    @foreach($data as $v)
                                        @if($v->id !='abcd')
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                            @endif

                                    @endforeach
                            </select>
                            </div>

                            </div>
                        </form>
                        </div>
                    </section>
                </div>
            </div>



        </div>
        <!--body wrapper end-->

        <!--footer section start-->

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


<!--multi-select-->
<script type="text/javascript" src="/resources/views/student/style/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="/resources/views/student/style/js/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script src="/resources/views/student/style/js/multi-select-init.js"></script>

<!--bootstrap input mask-->
<script type="text/javascript" src="/resources/views/student/style/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<!--common scripts for all pages-->
<script src="/resources/views/student/style/js/scripts.js"></script>
<script>
    $(function () {
        $(document).click(function (e) {
            var v_id = $(e.target).attr('id');
            if (v_id !=undefined){
                var i = v_id.indexOf('-')
                var str = v_id.substring(i,v_id.length)
                if (str =='-selectable'){
                    $.ajax({
                        url:'{{url('student/group_index').'/'.$v->class_id}}',
                        type:'post',
                        data:{id:v_id,_token:"{{csrf_token()}}"},
                    })
                }
                if(str=='-selection'){
                    $.ajax({
                        url:'{{url('student/group_del').'/'.$v->class_id}}',
                        type:'post',
                        data:{id:v_id,_token:"{{csrf_token()}}"},
                    })
                }
            }

        })

    })
</script>
</body>
</html>
