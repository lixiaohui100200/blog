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
                    <div class="col-lg-3 col-sm-3">
                        <div class="pricing-table">
                            <div class="pricing-head">
                                <h1> Basic </h1>

                            </div>
                            <div class="pricing-quote">
                                未就业
                            </div>
                            <ul class="list-unstyled">
                                <li>24/7 Tech Support</li>
                                <li>Advanced Options</li>
                                <li>100GB Storage</li>
                                <li>1GB Bandwidth</li>
                            </ul>
                            <div class="price-actions">
                                <a href="{{url('student/job/0').'/'.$class_id}}" class="btn">点击进入</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="pricing-table">
                            <div class="pricing-head">
                                <h1> starter </h1>

                            </div>
                            <div class="pricing-quote" style="font-size: 30px">
                               本周入职
                            </div>
                            <ul class="list-unstyled">
                                <li>24/7 Tech Support</li>
                                <li>Advanced Options</li>
                                <li>100GB Storage</li>
                                <li>1GB Bandwidth</li>
                            </ul>
                            <div class="price-actions">
                                <a href="javascript:;" class="btn">get it now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <div class="pricing-table most-popular">
                            <div class="pricing-head">
                                <h1> Premium </h1>

                            </div>
                            <div class="pricing-quote">
                                已就业
                            </div>
                            <ul class="list-unstyled">
                                <li>24/7 Tech Support</li>
                                <li>Advanced Options</li>
                                <li>100GB Storage</li>
                                <li>1GB Bandwidth</li>
                            </ul>
                            <div class="price-actions">
                                <a href="javascript:;" class="btn">get it now</a>
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
</script>

</body>
</html>
