@include('layouts.adminHead')
<style>
	.top_right .badge{
		border-radius: 50%;
		display:inline-block;
		background-color:red;
		width:15px;
		height:15px;
		text-align: center;
		line-height: 15px;
		color:#fff;
		font-size:8px;
		position: absolute;
		left:-30px;
		top:9px;
	}
	.top_right ul li{
		position: relative;
	}
	.top_right .fa-volume-up{
		font-size:20px;
	}

</style>
<body>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="{{url('admin/index')}}" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li target="main"> <i class="fa fa-fw fa-volume-up"></i>
				<li>@if($data == 0)
					@else
						<a href="{{url('admin/contact')}}" target="main"><span id="contact_name" class="badge">{{$data}}</span></a>
					@endif
				</li>


				<li>管理员：admin</li>
				<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/out')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/add')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
                    <li><a href="{{url('admin/list')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
                    <li><a href="{{url('admin/artAdd')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>
                    <li><a href="{{url('admin/artList')}}" target="main"><i class="fa fa-fw fa-reorder"></i>文章列表</a></li>
                    <li><a href="{{url('admin/contact')}}" target="main"><i class="fa fa-fw fa-reorder"></i>意见反馈</a></li>
                    <li><a href="{{url('admin/about')}}" target="main"><i class="fa fa-fw fa-user"></i>关于自己</a></li>
                </ul>
            </li>
			<li>
				<h3><i class="fa fa-fw fa-comments-o"></i>评论管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/comment')}}" target="main"><i class="fa fa-fw fa-reorder"></i>评论列表</a></li>
					<li><a href="{{url('admin/keywords')}}" target="main"><i class="fa fa-fw fa-reorder"></i>关键词过滤</a></li>
				</ul>
			</li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/banner_list')}}" target="main"><i class="fa fa-fw fa-file-image-o"></i>首页banner</a></li>
                    <li><a href="{{url('admin/banner_list_')}}" target="main"><i class="fa fa-fw fa-file-image-o"></i>其他页banner</a></li>
                    <li><a href="{{url('admin/database')}}" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		{{--CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.--}}
	</div>
	<!--底部 结束-->
	<script>

	</script>
</body>
</html>