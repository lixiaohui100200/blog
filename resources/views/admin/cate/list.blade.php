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
                        <th class="tc" >排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>title</th>
                        <th>关键字</th>
                        <th>关键字描述</th>
                        <th>点击量</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="change(this,{{$v->cate_id}})" name="ord[]" value="{{$v->cate_order}}">
                        </td>
                        <td class="tc">{{$v->cate_id}}</td>
                        <td>
                            <a href="#">{{$v->_cate_name}}</a>
                        </td>
                        <td>{{$v->cate_title}}</td>
                        <td>{{$v->cate_keywords}}</td>
                        <td>{{$v->cate_discription}}</td>
                        <td>{{$v->cate_view}}</td>
                        <td>
                            <a href="{{url('admin/edit/'.$v->cate_id)}}">修改</a>
                            <a href="javascript:;" onclick="delCate({{$v->cate_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

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
                    layer.alert(data.msg, {icon: 6});
                    setTimeout(function () {
                        location.href=location.href;
                    },1000)
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

</body>
</html>