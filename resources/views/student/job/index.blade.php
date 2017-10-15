<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Editable Table</title>

    <!--data table-->
    <link rel="stylesheet" href="/resources/views/student/style/js/data-tables/DT_bootstrap.css" />

    <link href="/resources/views/student/style/css/style.css" rel="stylesheet">
    <link href="/resources/views/student/style/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/resources/views/student/style/js/html5shiv.js"></script>
    <script src="/resources/views/student/style/js/respond.min.js"></script>
    <![endif]-->
    <style>
        .most-0 {
            background:red;
            color: #fff;
            box-shadow: 0 5px 0 #60b193;
        }
        .most-2 {
            background:yellow;
            color: #fff;
            box-shadow: 0 5px 0 #60b193;
        }
    </style>
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
                Editable Table
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Data Table</a>
                </li>
                <li class="active"> Editable Table </li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <!--body wrapper start-->
        <div class="wrapper">

            <div class="row">

                <div class="col-sm-12">

                    <!--price start-->
                    {{--<div class="text-center price-head">
                        <h1 class="color-terques"> 30 days Free Trial on All Accounts </h1>
                        <p>No risk. No hidden fees. Cancel at anytime. </p>
                    </div>--}}
                    <div class="col-lg-3 col-sm-3" style="left: 89px;">
                        <div class="pricing-table most-0" style="height: 485px;">
                            <div class="pricing-head">
                                <h1> Basic </h1>

                            </div>
                            <div class="pricing-quote">
                                未就业
                            </div>
                            <ul class="list-unstyled">
                                <li><div>
                                        <select name="class_id" class="class_one" style="width: 82px" >
                                            <option value="111">选择班级</option>
                                            @foreach($data as $v)
                                            <option value="{{$v->class_id}}">{{$v->class_name}}</option>
                                                @endforeach
                                        </select>
                                    </div></li>
                                <li>Advanced Options</li>

                            </ul>
                            <div class="price-actions">
                                <button type="button" id="btn_one" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3" style="left: 120px;">
                        <div class="pricing-table most-2" style="height: 485px;">
                            <div class="pricing-head">
                                <h1> starter </h1>

                            </div>
                            <div class="pricing-quote" style="font-size: 30px">
                               本周入职
                            </div>
                            <ul class="list-unstyled">
                                <li><select name="class_id" class="class_two" style="width: 82px" >
                                        <option value="222">选择班级</option>
                                        @foreach($data as $v)
                                        <option value="{{$v->class_id}}">{{$v->class_name}}</option>
                                            @endforeach
                                    </select></li>
                                <input type="hidden" name="type" value="1">
                                <li>1GB Bandwidth</li>
                            </ul>
                            <div class="price-actions">
                                <button type="button"  id="btn_two" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3" style="left: 150px;">
                        <div class="pricing-table most-popular" style="height: 485px;">
                            <div class="pricing-head">
                                <h1> Premium </h1>

                            </div>
                            <div class="pricing-quote">
                                已就业
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <select name="class_id" class="class_three" style="width: 82px" class="abcd">
                                        <option  value="333">选择班级</option>
                                        @foreach($data as $v)
                                        <option value="{{$v->class_id}}">{{$v->class_name}}</option>
                                            @endforeach
                                    </select>
                                    <input type="hidden" name="type" value="2">
                                </li>
                                <li>1GB Bandwidth</li>
                            </ul>
                            <div class="price-actions">
                                <button type="button" id="btn_three" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </div>


                    <!--price end-->
                </div>

            </div>

        </div>
        <!--body wrapper end-->
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
<script type="text/javascript" src="/resources/org/layer/layer.js"></script>

<!--data table-->
<script type="text/javascript" src="/resources/views/student/style/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/resources/views/student/style/js/data-tables/DT_bootstrap.js"></script>

<!--common scripts for all pages-->
<script src="/resources/views/student/style/js/scripts.js"></script>

<!--script for editable table-->
<script src="/resources/views/student/style/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
    $(function () {
        $('#btn_one').click(function () {
            var data1 = $('.class_one').val();
            if (data1 ==111){
                layer.alert('请选择班级', {
                    icon: 5,
                });
                return;
            }
            location.href = '{{url('student/job_message/0').'/'}}'+data1;

        })
        $('#btn_two').click(function () {
            var data1 = $('.class_two').val();
            if (data1 ==222){
                layer.alert('请选择班级', {
                    icon: 5,
                });
                return;
            }
            location.href = '{{url('student/job_message/1').'/'}}'+data1;

        })
        $('#btn_three').click(function () {
            var data1 = $('.class_three').val();
            if (data1 ==333){
                layer.alert('请选择班级', {
                    icon: 5,
                });
                return;
            }
            location.href = '{{url('student/job_message/2').'/'}}'+data1;

        })

    })


</script>

</body>
</html>
