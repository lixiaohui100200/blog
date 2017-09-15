@include('layouts.homeHead')
<!-- banner -->
<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="contact-section">
				<h2 class="w3">联系我们</h2>
					
				
					<div class="contact-grids">
						<div class="col-md-8 contact-grid">
							
							<p>您好,如果您对我们的博客有什么建议或者意见 , 还是您想让我更新什么内容 , 请您提出宝贵建议!</p>
							<form id="formData" action="" method="post">
								{{csrf_field()}}
								<input type="text" name="contact_name" value="姓名 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '姓名';}" required="">
								<input type="email" name="contact_email" value="邮箱" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '邮箱';}" required="">
								<input type="text" name="contact_tel" value="手机" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '手机';}" required="">
								<textarea type="text" name="contact_content" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '您的建议。。。';}" required="">您的建议。。。</textarea>
								<input type="button" value="Send" id="contact_id">
							</form>
						</div>
						<div class="clearfix"></div>
					</div>

				
			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
		@include('layouts.homeRight')
				</div>
				
			
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
@include('layouts.homeFooter')
</body>
<script>
	$(function () {
		$('#contact_id').click(function () {
			var formData = new FormData($('#formData')[0])
			$.ajax({
				url:'{{url('/contact')}}',
				type:'post',
				data:formData,
				contentType:false,
				processData:false,
				success:function (data) {
					
				}
			})
		})
	})
</script>
</html>