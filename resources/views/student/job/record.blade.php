<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Profile</title>

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

                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <ul class="p-info">
                                @foreach($data as $v)
                                <li>
                                    <div class="title">姓名</div>
                                    <div class="desk">{{$v->name}}</div>
                                </li>
                                <li>
                                    <div class="title">电话</div>
                                    <div class="desk">{{$v->tel}}</div>
                                </li>
                                <li>
                                    <div class="title">QQ</div>
                                    <div class="desk">{{$v->qq}}</div>
                                </li>
                                <li>
                                    <div class="title">学历</div>
                                    <div class="desk">{{$v->edu}}</div>
                                </li>
                                <li>
                                    <div class="title">专业</div>
                                    <div class="desk">{{$v->major}}</div>
                                </li>
                                <li>
                                    <div class="title">入职状态</div>
                                    <div class="desk">@if($v->type==0)未入职@else已入职@endif</div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach($record as $va)
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states">
                                <div class="summary pull-left">
                                    <h4>跟踪进度</h4>
                                    <hr style="margin-top: 6px;margin-bottom: 5px;">
                                    <div>{{$va->record}}</div>
                                    <span style="font-size: 4px;padding-left: 279px;">{{$va->record_user}}&nbsp;:&nbsp;{{$va->record_time}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <form action="">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Textarea label</label>
                        <div class="col-sm-10">
                            <textarea rows="6"  class="form-control"></textarea>
                        </div>
                    </div>
                    <div style="padding-left: 361px;">
                        <button type="button" id="btn" class="btn btn-primary">发送</button>
                    </div>
                </form>
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

<!--google map-->



<!--common scripts for all pages-->
<script src="/resources/views/student/style/js/scripts.js"></script>
<script>
    $(function () {
        $('#btn').click(function () {
            var data = $('.form-control').val();
            var data_last = {record:data,_token:'{{csrf_token()}}',stu_id:'{{$v->id}}'}
            $.ajax({
                url:'{{url('student/record_content')}}',
                type:'post',
                data:data_last,
                success:function (data) {
                    if (data.state==100){
                        layer.alert(data.msg, {icon: 5,})
                    }
                    if (data.state==200){
                        layer.msg(data.msg);
                        setTimeout(function () {
                            location.href = location.href
                        }, 2000)
                    }
                }
            })
        })
    })
</script>
</body>
</html>
