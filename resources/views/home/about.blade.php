@include('layouts.homeHead')
<!-- banner -->
<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="w3agile-1">
			@foreach($about as $v)
			<div class="welcome">
				<div class="welcome-top heading">
					<h2 class="w3">{{$v->ab_title}}</h2>
					<div class="welcome-bottom">
						<img src="{{$v->ab_image}}" class="img-responsive" alt="">
						<p>{!! $v->ab_content !!}</p>
					</div>
				</div>
			</div>
			@endforeach
			{{--<div class="team">
				<h3 class="team-heading">Meet our team</h3>
				<div class="team-grids">
					<div class="col-md-6 team-grid">
						<div class="team-grid1">
							<img src="/resources/views/home/images/2.jpg" alt=" " class="img-responsive">
							<div class="p-mask">
								<p>Neque porro quisquam est, qui dolorem ipsum.</p>
								
							</div>
						</div>
						<h5>Laura Mark<span>Sales Manager</span></h5>
						<ul class="social">
							<li><a class="social-facebook" href="#">
								<i></i>
								<div class="tooltip"><span>Facebook</span></div>
								</a></li>
							<li><a class="social-twitter" href="#">
								<i></i>
								<div class="tooltip"><span>Twitter</span></div>
								</a></li>
							<li><a class="social-google" href="#">
								<i></i>
								<div class="tooltip"><span>Google+</span></div>
								</a></li>
						</ul>
					</div>
					<div class="col-md-6 team-grid">
						<div class="team-grid1">
							<img src="/resources/views/home/images/3.jpg" alt=" " class="img-responsive">
							<div class="p-mask">
								<p>Neque porro quisquam est, qui dolorem ipsum.</p>
								
							</div>
						</div>
						<h5>Joseph Ali<span>Manager</span></h5>
						<ul class="social">
							<li><a class="social-facebook" href="#">
								<i></i>
								<div class="tooltip"><span>Facebook</span></div>
								</a></li>
							<li><a class="social-twitter" href="#">
								<i></i>
								<div class="tooltip"><span>Twitter</span></div>
								</a></li>
							<li><a class="social-google" href="#">
								<i></i>
								<div class="tooltip"><span>Google+</span></div>
								</a></li>
						</ul>
					</div>
					
				
					<div class="clearfix"> </div>
				</div>				
			</div>--}}
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
</html>