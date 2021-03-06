<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
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
                    <font color="red">
                        <li>{{ $error }}</li>
                    </font>
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
    <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th>分类图片：</th>
                <td>
                    <input type="file" class="lg" id="upload" name="banner_image">
                </td>

            </tr>
            <tr>
                <td>
                    <input type="text" class="lg"  name="abfs">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="lg"  name="abd">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="lg"  name="abc">
                </td>
            </tr>
            <th></th>
            <td>
                <input type="button" value="提交" id="sbu">
                <input type="button" class="back" onclick="history.go(-1)" value="返回">
            </td>

            </tr>
            </tbody>
        </table>
    </form>
</div>

</body>
<script>
    $(function () {
        $('#sbu').click(
                function () {
                    var formData = new FormData($('#uploadForm')[0]);
                    //formData.append('ext', $('#upload1').val());
                    $.ajax({
                        url: '{{url('admin/banner')}}',
                        type: 'POST',
                        data: formData,
                        //async: false,
                        //cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {

                            if (data.state == "200") {
                                layer.msg(data.msg)
                                setTimeout(function () {
                                    location.href = '{{url('admin/banner_list')}}'
                                }, 2000)
                            }
                            if (data.state == "400") {
                                layer.msg(data.msg)
                                setTimeout(function () {
                                    location.href = '{{url('admin/banner_list')}}'
                                }, 2000)
                            }

                        }

                    });
                }
        )
    })

</script>
</html>