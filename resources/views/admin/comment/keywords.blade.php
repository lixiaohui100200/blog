<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/layer.css')}}">

    <link href="/resources/views/home/css/style.css" rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<style>
    table.list_tab tr td, table.list_tab tr th {
        text-align: center;
    }

    table.list_tab tr td a {
        margin-right: 10px;
        float: none;
    }
</style>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 分类列表
</div>
<!--面包屑导航 结束-->


<!--搜索结果页面 列表 开始-->
<form action="" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/artAdd')}}"><i class="fa fa-plus"></i>添加文章</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>
</form>
<div class="result_wrap">
    <div class="w3agile-1" style="height: 500px">
        <div class="welcome">
            <div class="welcome-top heading">
                <div class="layui-inline">

                    <label>关键字：</label>
                    <div class="layui-input-inline">
                        <input type="tel" lay-verify="phone" placeholder="请输入关键字" class="layui-input">
                    </div>
                    <div style="height: 20px"></div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button id="button1" class="layui-btn layui-btn-radius">立即提交</button>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="button_keywords">
                @if($arr[0] !='')

                    @foreach($arr as $v)
                        <button name="keywords" class="layui-btn layui-btn-danger layui-btn-radius" style="margin-top: 20px">{{$v}}</button>
                    @endforeach

                @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>
<script>
    $(function () {
        $('#button1').click(function () {
            var data = $('.layui-input').val()
            var data1 = {'keywords': data, '_token': '{{csrf_token()}}'}
            $.ajax({
                url: '{{url('admin/keywords')}}',
                type: 'post',
                data: data1,
                success: function (data2) {
                    if (data2.state == 200) {
                        $('.layui-input').val('')
                        layer.msg(data2.msg)
                        $('.button_keywords').append('<button name="keywords" ' +
                                'class="layui-btn layui-btn-danger layui-btn-radius" ' +
                                'style="margin-top: 20px">'+data+'</button>')
                    }
                    if (data2.state == 001) {
                        layer.msg(data2.msg)
                    }
                }
            })
        })
        //阻止事件冒泡 $(父节点).on('click',"当前节点",function () {}
        $('.button_keywords').on('click',"[name='keywords']",function () {
            var keys = $(this).html()
            var this_= this
            var data = {'keys':keys,'_token':'{{csrf_token()}}'}
            $.ajax({
                url: '{{url('admin/remove_key')}}',
                type: 'post',
                data: data,
                success: function (data) {
                    if (data.state == 001){
                        layer.msg(data.msg)
                    }
                    if (data.state ==200){
                        layer.msg(data.msg)
                        $(this_).remove()
                    }
                }
            });
        })
    })
</script>
</body>
</html>