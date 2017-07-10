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
                    <a href="{{url('admin/add')}}"><i class="fa fa-plus"></i>新增分类</a>
                    <a href="{{url('admin/list')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" >ID</th>
                        <th class="tc">标题</th>
                        <th>关键字</th>
                        <th>描述</th>
                        <th>点击量</th>
                        <th>添加时间</th>
                        <th>配图</th>
                        <th>作者</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                  <tr align="center">
                        <td class="tc">{{$v->art_id}}</td>
                        <td>
                            <a href="#" style="text-align:center;width: 100%">{{$v->art_title}}</a>
                        </td>
                        <td>{{$v->art_keywords}}</td>
                        <td>{{$v->art_discription}}</td>
                        <td>{{$v->art_view}}</td>
                        <td>{{$v->art_time}}</td>
                        <td><img src="{{asset('/')}}{{$v->art_image}}" alt="" width="60px" height="50px"></td>
                        <td>{{$v->art_editor}}</td>
                        <td>
                            <a href="{{url('admin/artEdit/'.$v->art_id)}}">修改</a>
                            <a href="javascript:;" onclick="">删除</a>
                        </td>
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

    <script>
        function change(obj,cate_id) {
            var cate_order = $(obj).val();
            $.post("{{url('admin/changeorder')}}",{'_token':'{{csrf_token()}}','cate_order':cate_order,'cate_id':cate_id},
                    function (data) {
                if(data.state == 1){
                    location.href=location.href;
                    layer.alert(data.msg, {icon: 6});
                }else{
                    layer.alert(data.msg, {icon: 5});
                }
            })
        }
        function delCate(cate_id) {
            layer.confirm('你确定要删除分类吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                    $.post("{{url('admin/del/')}}/"+cate_id,{'_token':'{{csrf_token()}}'},function (data) {
                        if (data.state==1){
                            location.href=location.href;
                            layer.msg(data.msg, {icon: 1});
                        }else {
                            layer.msg(data.msg, {icon: 1});
                        }
                    });
                }, function(){
                    /*layer.msg('也可以这样', {
                        time: 20000, //20s后自动关闭
                        btn: ['明白了', '知道了']
                    });*/
            });
        }
    </script>
    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>
</body>
</html>