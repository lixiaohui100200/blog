<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
</head>
<body>
    <form action="{{url('admin/_import')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="result_wrap">
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th>属性</th>
                        <th>操作</th>
                    </tr>

                    <tr>
                        <td>数据备份</td>
                        <td>
                            <a href="{{url('admin/down')}}">备份下载</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="file" name="sql"></td>
                        <td>
                            <input type="submit" value="提交">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

</body>
</html>