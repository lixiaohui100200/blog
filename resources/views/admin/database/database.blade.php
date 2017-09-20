<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<style>
    #subid{
        padding: 0 25px;
        height: 25px;
        vertical-align: middle;
        margin-right: 10px;
        color: #fff;
        letter-spacing: 2px;
        border-radius: 3px;
        background: #337ab7;
        border: 1px solid #286090;
        cursor: pointer;
    }
</style>
<body>
    <form action="" id="formdata" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="result_wrap">
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th>属性</th>
                        <th>操作</th>
                    </tr>

                    <tr>
                        <td>数据备份</td>
                        <td>
                            <a href="{{url('admin/down')}}">备份下载</a>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="file" name="sql"></td>
                        <td>
                            <input type="button" id="subid" value="提交">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

</body>
<script>
    $(function () {
      $('#subid').click(function () {
          var formD = new FormData($('#formdata')[0])
          $.ajax({
              url:'{{url('admin/_import')}}',
              type:'post',
              data:formD,
              contentType:false,
              processData:false,
              success:function (data) {
                  if(data.state == 200){
                      layer.msg(data.msg)
                      setTimeout(function () {
                          location.href = '{{url('admin/database')}}'
                      }, 1000)
                  }
                  if(data.state == 0){
                      layer.alert(data.msg, {icon: 5,})
                  }
              }
          });
      })  
    })
</script>
</html>