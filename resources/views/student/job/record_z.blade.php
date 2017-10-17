<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Profile</title>
    <!--pickers css-->
    <link rel="stylesheet" type="text/css" href="/resources/views/student/style/js/bootstrap-datepicker/css/datepicker-custom.css" />
    <link href="/resources/views/student/style/css/style.css" rel="stylesheet">
  <link href="/resources/views/student/style/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/resources/views/student/style/js/html5shiv.js"></script>
  <script src="/resources/views/student/style/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<div class="wrapper">

    <div class="row">
        <div class="col-md-4">
            <div class="row">

                <div class="col-md-12" style="width: 430px">
                    <div class="panel">
                        <div class="panel-body">
                            <ul class="p-info">
                                @foreach($data as $v)
                                <li>
                                    <div class="title">姓名</div>
                                    <div class="desk">{{$v->name}}</div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-6">
                        <section class="panel" style="width: 400px">
                            <header class="panel-heading">
                                就业信息统计
                            </header>
                            <div class="panel-body">
                                <form role="form" id="formData" action="">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="offer" value="@if($en=='')@else {{$en->offer}} @endif" placeholder="几个offer">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="@if($en=='')@else {{$en->interview}} @endif" name="interview" placeholder="面试几家">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="@if($en=='')@else {{$en->company}} @endif" name="company" placeholder="入职公司名称">
                                    </div>
                                    <div class="form-group">
                                        <input   type="date"  class="form-control" name="en_time" value="@if($en=='')@else{{$en->en_time}}@endif" placeholder="入职日期" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pay" value="@if($en=='')@else {{$en->pay}} @endif" placeholder="薪资">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="boon" value="@if($en=='')@else {{$en->boon}} @endif" placeholder="几险几金">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" value="@if($en=='')@else {{$en->city}} @endif" placeholder="就业城市">
                                    </div>
                                    <button type="button" class="btn btn-primary">提交</button>
                                </form>

                            </div>
                        </section>
                    </div>
            </div>
        </div>

    </div>

</div>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/resources/views/student/style/js/jquery-1.10.2.min.js"></script>
<script src="/resources/views/student/style/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/resources/views/student/style/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/resources/views/student/style/js/bootstrap.min.js"></script>
<script src="/resources/views/student/style/js/modernizr.min.js"></script>
<script src="/resources/views/student/style/js/jquery.nicescroll.js"></script>


<!--Sparkline Chart-->
<script src="/resources/views/student/style/js/sparkline/jquery.sparkline.js"></script>
<script src="/resources/views/student/style/js/sparkline/sparkline-init.js"></script>
<script type="text/javascript" src="/resources/org/layer/layer.js"></script>

<!--pickers plugins-->
<script type="text/javascript" src="/resources/views/student/style/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!--pickers initialization-->

<!--common scripts for all pages-->
<script src="/resources/views/student/style/js/scripts.js"></script>
<script>
    $(function () {
        $('.btn').click(function () {
            var data = new FormData($('#formData')[0]);
            $.ajax({
                url:'{{url('student/record_z').'/'.$v->id}}',
                type:'post',
                data:data,
                contentType:false,
                processData:false,
                success:function (data) {
                    alert(234);
                }
            })
        })
    })
</script>
</body>
</html>
