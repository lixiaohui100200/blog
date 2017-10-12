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
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    班级列表
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group pull-right">

                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="space15"></div>
                <table  class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>

                    <th>姓名</th>
                    <th>QQ</th>
                    <th>电话</th>
                    <th>入职状态</th>
                    <th >追踪信息</th>
                    <th style="width: 130px;">更改为本周入职</th>
                    <th style="width: 130px;">更改为已入职</th>

                </tr>
                </thead>
                <tbody id="top_id">
                @foreach($data as $v)
                <tr class="">
                    <td >{{$v->name}}</td>
                    <td>{{$v->qq}}</td>
                    <td>{{$v->tel}}</td>
                    <td>
                        @if($v->job_type==0)
                            未入职
                            @endif
                    </td>
                    <td><a style="color: #365bff" href="javascript:;" class="content_job" data-id="{{$v->id}}">添加/查看</a></td>
                    <td>
                        <a href="javascript:void(0);" data-id="{{$v->id}}" class="button-next  btn btn-info" style="margin-left: 30px;padding-top: 0px;height: 23px;width: 45px;padding-left: 8px;">更改</a>
                    </td>
                    <td>
                        <a  href="javascript:void(0);" data-id="{{$v->id}}" class="button-next2  btn btn-info" style="margin-left: 30px;padding-top: 0px;height: 23px;width: 45px;padding-left: 8px;">更改</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                </div>
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
        $('#top_id').on('click','.content_job',function () {
            var id = $(this).attr('data-id')
            layer.open({
                type: 2,
                title: '',
                maxmin: true,
                shadeClose: true, //点击遮罩关闭层
                area : ['500px' , '700px'],
                content: '{{url('student/record')}}/'+id
            });
        })
    $('.button-next').click(function () {
        var id = $(this).attr('data-id');
        var data = {id:id,_token:'{{csrf_token()}}'}
        layer.confirm('修改后请到<span style="color: #5000ff">本周入职</span>内查看该学员', {
            btn: ['修改','取消'] //按钮
        }, function(){
            $.ajax({
                url:'{{url('student/record_revamp')}}',
                type:'post',
                data:data,
                success:function (data) {
                    if (data.state==200){
                        layer.msg(data.msg, {
                            icon: 1,
                            time:10000
                        });
                        setTimeout(function () {
                            location.href= location.href
                        },1000)
                    }
                }
            })

        });
    })
    $('.button-next2').click(function () {
            var id = $(this).attr('data-id');
            var data = {id:id,_token:'{{csrf_token()}}'}
            layer.confirm('修改后请到<span style="color: #5000ff">已就业</span>内查看该学员', {
                btn: ['修改','取消'] //按钮
            }, function(){
                $.ajax({
                    url:'{{url('student/record_revamp_y')}}',
                    type:'post',
                    data:data,
                    success:function (data) {
                        if (data.state==200){
                            layer.msg(data.msg, {
                                icon: 1,
                                time:10000
                            });
                            setTimeout(function () {
                                location.href= location.href
                            },1000)
                        }
                    }
                })

            });
        })
    })
</script>

</body>
</html>
