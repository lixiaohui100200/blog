<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
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
                    <tr>
                        <th width="120"><i class="require">*</i>父级分类：</th>
                        <td>
                            <select name="cate_pid">
                                <option value="0">==顶级分类==</option>
                                @foreach($data as $v)
                                    @foreach($data1 as $v1)
                                <option value="{{$v1->cate_id}}"
                                        @if($v1->cate_id==$v->cate_pid)selected
                                            @endif
                                >{{$v1->cate_name}}</option>
                                        @endforeach
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" value="{{$v->cate_name}}" name="cate_name">

                        </td>
                    </tr>
                    <tr>
                        <th>分类标题：</th>
                        <td>
                            <input type="text" value="{{$v->cate_title}}" class="lg" name="cate_title">
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <textarea name="cate_keywords">{{$v->cate_keywords}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>关键词描述：</th>
                        <td>
                            <textarea name="cate_discription">{{$v->cate_discription}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>分类排序：</th>
                        <td>
                            <input type="text" value="{{$v->cate_order}}" class="sm" name="cate_order">
                        </td>
                    </tr>

                    <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>