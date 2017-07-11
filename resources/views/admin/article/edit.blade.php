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
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
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
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/add')}}"><i class="fa fa-plus"></i>新增分类</a>
               {{-- <a href="{{url('admin/list')}}"><i class="fa fa-refresh"></i>更新排序</a>--}}
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <th width="120"><i class="require">*</i>文章分类：</th>
                        <td>
                            <select name="cate_id">
                                <option value="哒哒哒">==选择分类==</option>
                                @foreach($dat as $i)
                                <option value="{{$i->cate_id}}"
                                @if($i->cate_id==$v->cate_id)
                                    selected
                                    @endif
                                >{{$i->cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title" value="{{$v->art_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <textarea name="art_keywords">{{$v->art_keywords}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>关键词描述：</th>
                        <td>
                            <textarea name="art_discription">{{$v->art_discription}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>点击量：</th>
                        <td>
                            <input type="text" name="art_view" value="{{$v->art_view}}">

                        </td>
                    </tr>

                    <tr>
                        <th>缩略图：</th>
                        <td>
                            <div id="queue"></div>
                            <input type="text" class="sm" name="art_image" value="{{$v->art_image}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <img src="/{{$v->art_image}}"  id="art_image1" width="50px" >

                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('admin/upload')}}",
                                        'fileTypeExts' : '*.gif; *.jpg; *.png; *.jpeg',
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('input[name=art_image]').val(data);
                                            $('#art_image1').attr('src','/'+data).css({
                                                'display':'block'
                                            });
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" class="sm" name="art_editor" value="{{$v->art_editor}}">
                        </td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <script id="editor" type="text/plain" name="art_content" style="width:1024px;height:200px;">{!!$v->art_content!!}</script>
                        </td>
                    </tr>
                    @endforeach
                    <th></th>
                        <td>
                            <input type="button" id="artEdit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
    $('#artEdit').click(function(){
        $.post('{{$_SERVER['REQUEST_URI']}}',
                $('form').serialize(),
                function (data) {
                    if(data.state==200){
                        layer.msg(data.msg, {icon: 1});
                        setTimeout(function () {
                            location.href="{{url('admin/artList')}}"
                        },2000)
                    }else{
                        layer.msg(data.msg, {icon: 2});
                        setTimeout(function () {
                            location.href="{{url('admin/artList')}}"
                        },2000)
                    }

                }
        );
    })




</script>
</html>