<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
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
<form action="#" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/artAdd')}}"><i class="fa fa-plus"></i>添加文章</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th class="tc">姓名</th>
                    <th>邮箱</th>
                    <th>电话</th>
                    <th>反馈内容</th>
                    <th>反馈IP</th>
                    <th>反馈时间</th>
                    <th>状态</th>
                </tr>
                @foreach($data as $v)
                    <tr align="center">
                        <td class="tc">{{$v->con_id}}</td>
                        <td>{{$v->con_name}}</td>
                        <td>{{$v->con_email}}</td>
                        <td>{{$v->con_tel}}</td>
                        <td><input type="button" class="butt" value="点击详情" data-title="{{$v->con_id}}"></td>
                        <td>{{$v->con_ip}}</td>
                        <td>{{$v->con_time}}</td>
                        <td>已读</td>
                    </tr>
                @endforeach
            </table>
            <div class="page_list">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>
<script>
    $(function () {
        $('.butt').click(function () {
            var data = $(this).attr('data-title')
            $.ajax({
                'url':'{{url('admin/')}}',
            })
        })
    })

</script>
</body>
</html>