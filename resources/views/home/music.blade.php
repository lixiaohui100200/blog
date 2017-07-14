@include('layouts.homeHead')
<!-- banner -->
	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="music">
				@foreach($data as $v)
					<a href="{{url('/single/'.$v->art_id)}}">
						<div class="latest">
							<h2 class="w3">{{$v->art_title}}</h2>
							<div class="tip-grids">
								<div class="col-md-6 tip-grid">
									<figure class="effect-julia">
										<img src="/{{$v->art_image}}" alt="">

									</figure>
								</div>
								<div class="col-md-6 tip-grid-right">
									<div class="tip-gd-left">
										<h4>{{$v->art_title}}</h4>
										<p> {{$v->art_discription}}</p>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</a>
				@endforeach
				{{--<div class="effect-grid">
						<h3 class="w3">PROGRAMS</h3>
						<ul class="grid cs-style-3">
						<li>
							<figure>
								<img src="/resources/views/home/images/m1.jpg" alt="img02">
								<figcaption>
									<h4>PROGRAMS</h4>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="/resources/views/home/images/m2.jpg" alt="img03">
								<figcaption>
									<h4>PROGRAMS</h4>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="/resources/views/home/images/m3.jpg" alt="img06">
								<figcaption>
									<h4>PROGRAMS</h4>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="/resources/views/home/images/m3.jpg" alt="img04">
								<figcaption>
									<h4>PROGRAMS</h4>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="/resources/views/home/images/m2.jpg" alt="img05">
								<figcaption>
									<h4>PROGRAMS</h4>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<img src="/resources/views/home/images/m1.jpg" alt="img01">
								<figcaption>
									<h4>PROGRAMS</h4>
								</figcaption>
							</figure>
						</li>
						<div class="clearfix"></div>
					</ul>
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