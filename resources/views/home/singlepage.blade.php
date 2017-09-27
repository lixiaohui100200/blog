@include('layouts.homeHead')
<!-- banner -->
<!-- technology-left -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="agileinfo">
                @foreach($data as $v)
                    <h2 class="w3">{{$v->art_title}}</h2>
                    <div class="single">
                        <img src="/{{$v->art_image}}" class="img-responsive" alt="">
                        <div class="b-bottom">
                            {{-- <h5 class="top">What turn out consetetur sadipscing elit</h5>--}}
                            <div style="width: 80%;height: 40%">
                                <p class="sub">{!! $v->art_content !!}</p>
                            </div>

                            <p>On Aug 01 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0
                                </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56
                                </a></p>


                        </div>
                    </div>
                @endforeach


                <div class="response">
                    <h4>评论</h4>
                    {{--评论--}}
                    <div class="media response-info">
                        @foreach($comment as $va)
                        <div class="media-left response-text-left">
                            <a href="#">
                                <img style="height: 100px;width: 100px" src="/resources/views/home/images/sin1.jpg" class="img-responsive" alt="">
                            </a>
                        </div>
                        <div class="media-body response-text-right">
                            <div style="height: 100px">{{$va->comment}}</div>
                            <ul>
                                <li>{{$va->comment_date}}</li>

                            </ul>

                        </div>
                        <div class="clearfix"></div>
                            <hr>
                            @endforeach
                    </div>

                </div>
                <div class="coment-form">
                    <h4>留下你的评论</h4>
                    <form action="" method="post">
                        <textarea name="comment" id="comment" cols="30" rows="10" required="" placeholder="请填写您的评论。。。"></textarea>
                        <input id="comment_id" type="button" value="提交评论">
                    </form>
                </div>
                <div class="clearfix"></div>
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
<script>
    $(function () {
        $('#comment_id').click(function () {
            var dat = $('#comment').val()
            if(dat == ''){
                layer.msg('填写内容不能为空')
            }else{
                $.ajax({
                    url: '{{url('/singles')}}',
                    type: 'post',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'art_id':'{{$v->art_id}}',
                        'comment': dat,
                    },
                    success: function (data) {
                        if(data.state == 0){
                            layer.msg(data.msg)
                        }
                        if(data.state == 01){
                            layer.msg(data.msg)
                        }
                        if(data.state == 02){
                            layer.msg(data.msg)
                        }
                        if(data.state == 200){
                            layer.msg(data.msg)
                        }
                        location.href = '{{url("single/$v->art_id")}}'
                    }
                })
            }

        })
    })
</script>
</body>
</html>