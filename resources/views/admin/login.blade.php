<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
	<script src="/resources/views/home/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>

</head>
<style>
	#sub {
		font-family: "微软雅黑";
		width: 240px;
		height: 33px;
		border-radius: 3px;
		color: #fff;
		background: #337ab7;
		border: 1px solid #2e6da4;
	}
</style>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			@if(session('msg'))
			<p style="color:red">{{session('msg')}}</p>
			@endif
			<form id="formData" method="post">
                {{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pwd" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
					</li>
					<li>
						<input type="button" id="sub" value="立即登陆"/>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
<script>
	$(function () {

		$('#sub').click(function () {
			var formData = new FormData($('#formData')[0])
			$.ajax({
				url:'{{url('admin/login')}}',
				type:'post',
				data:formData,
				contentType:false,
				processData:false,
				success:function (data) {
					if(data.state == 200){
						layer.msg(data.msg)
						setTimeout(function () {
							location.href = '{{url('admin/index')}}'
						}, 2000)
					}
					if (data.state == 301){
						layer.alert(data.msg, {icon: 5,})
					}
					if (data.state == 300){
						layer.alert(data.msg, {icon: 5,})
					}
				}
			})
		})
	})
</script>
</html>