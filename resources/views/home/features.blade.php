@include('layouts.homeHead')
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
		<div class="agile-1 clearfix">
			<div class="features-main">
				<div class="fea-top">
				  <h3 class="w3">AMAZING FEATURES</h3>
				  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta.</p>
				</div>
				<div class="feature-botttom clearfix">
                    @foreach($data as $v)
							<div class="fea-grid deCss" style="width:353px;height:300px;float:left;margin-right:10px;">
								<div class="fea-img">
									<img src="{{$v->cate_image}}" alt="">
								</div>
								<div class="fea-text">
									<h4>{{$v->cate_name}}</h4>
									<p>{{$v->cate_title}}</p>
								 </div>
							</div>
					@endforeach

				</div>
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
</html>