@include('layouts.homeHead')
<!-- banner -->
<!-- technology-left -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="contact-section" style="padding-bottom: 500px;">
                <h2 class="w3">联系我们</h2>
                <br>
                <p>您好,如果您对我们的博客有什么建议或者意见 , 还是您想让我更新什么内容 , 请您提出宝贵建议!</p>
                <div class="contact-grids">
                    <div class="col-md-8 contact-grid">
                        <form id="formData" action="" method="post">
                            {{csrf_field()}}
                            <input type="text" name="con_name" placeholder="姓名">
                            <input type="email" name="con_email" placeholder="邮箱">
                            <input type="text" name="con_tel" placeholder="电话">
                            <textarea type="text" name="con_content" placeholder="您的建议。。。"></textarea>
                            <input type="button" value="Send" id="contact_id">
                        </form>
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
<script>
    $(function () {
        $('#contact_id').click(function () {
            var formData = new FormData($('#formData')[0])
            $.ajax({
                url: '{{url('/contact')}}',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.state == 200) {
                        layer.msg(data.msg)
                        setTimeout(function () {
                            location.href = '{{url('/contact')}}'
                        }, 1000)
                    }
                    if (data.state == 0) {
                        layer.alert(data.msg, {icon: 5,})
                    }
                    if (data.state == 300) {
                        layer.msg(data.msg)
                        setTimeout(function () {
                            location.href = '{{url('/contact')}}'
                        }, 2000)
                    }
                }
            })
        })
    })
</script>
</html>