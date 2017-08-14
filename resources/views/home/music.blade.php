@include('layouts.homeHead')
<!-- banner -->
<style>
    .music .pagination li.active span{
        background-color: #000;
    }
</style>
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
                    {{$data->links()}}

                <li class="demospan" style="margin-left:50px;display:inline-block;border:none;"><span style="border:none;color:black;">共{{$data->count()}}页</span></li>
					<script>

						$(".pagination").append($(".demospan"));

					</script>
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