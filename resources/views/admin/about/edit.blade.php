<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>

</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="/">首页</a> &raquo; <a href="{{url('admin/about')}}">关于自己</a> &raquo; 关于修改
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if (count($errors) > 0)
                <div class="mark">
                    @foreach ($errors->all() as $error)
                        <font color="red"><li>{{ $error }}</li></font>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form  action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <th><i class="require">*</i>欢迎标题：</th>
                        <td>
                            <input type="text" class="lg" name="ab_title" value="{{$v->ab_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>图片：</th>
                        <td>
                            <input type="file" name="ab_image">
                            <img src="{{$v->ab_image}}" alt="" width="200px">
                        </td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <script id="editor" type="text/plain" name="ab_content" style="width:1024px;height:200px;">{!! $v->ab_content !!}}</script>
                        </td>
                    </tr>
                    @endforeach
                    <th></th>
                        <td>
                            <input type="submit" id="sub" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
<script type="text/javascript">
    $(function () {
        var ue = UE.getEditor('editor');
    })






</script>
</html>
