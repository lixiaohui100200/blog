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
                    <th>反馈IP</th>
                    <th>反馈时间</th>
                    <th>状态</th>
                    <th>反馈内容</th>
                </tr>
                @foreach($data as $v)
                    <tr align="center">
                        <td class="tc">{{$v->con_id}}</td>
                        <td>{{$v->con_name}}</td>
                        <td>{{$v->con_email}}</td>
                        <td>{{$v->con_tel}}</td>
                        <td>{{$v->con_ip}}</td>
                        <td>{{$v->con_time}}</td>
                        <td class="ab{{$v->con_id}}">
                            @if($v->con_read == 0)
                                <spen style="color: red">未读</spen>
                                @else
                            已读
                                @endif
                        </td>
                        <td><input type="button" class="butt" value="详情" data-title="{{$v->con_id}}"></td>

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
            var data2 = {id:data,_token:'{{csrf_token()}}'}
            $.ajax({
                url : '{{url('admin/contact_content')}}',
                type : 'post',
                data : data2,
                success : function (data) {
                    if (data.state == 200){
                        layer.open({
                            type: 1
                            ,title: false //不显示标题栏
                            ,closeBtn: false
                            ,area: '300px;'
                            ,shade: 0.8
                            ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                            ,btn: ['关闭']
                            ,moveType: 1 //拖拽模式，0或者1
                            ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+data.msg+'</div>'
                            ,success: function(layero){
                                var btn = layero.find('.layui-layer-btn');
                                btn.css('text-align', 'center');
                                btn.find('.layui-layer-btn0').attr({
                                    target: '_blank'
                                });
                            }
                        });
                    }
                }
            })
            var abc= 'ab'+data
            $("."+abc).text('已读')

        })
    })

</script>
</body>
</html>