@extends('home.public.base')

@section('body')
	<!-- 主体 -->
	<div class="row">
		<!-- 左侧8列 -->
		<div class="col-md-8">
		<!-- 页头 -->
		<div class="page-header">
  			<h2>用户注册</h2>
		</div>
		<!-- 注册表单:采用水平表单 -->
		<form class="form-horizontal" method="post" id="login">
            {{csrf_field()}}
  <div class="form-group">
    <label for="inputEmail1" class="col-sm-2 control-label">用户名:</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputEmail1" placeholder="UserName">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail2" class="col-sm-2 control-label">邮箱:</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" id="inputEmail2" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">手机:</label>
    <div class="col-sm-10">
      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="Mobile">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword4" class="col-sm-2 control-label">密码:</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword5" class="col-sm-2 control-label">确认密码:</label>
    <div class="col-sm-10">
      <input type="password" name="password_confirm" class="form-control" id="inputPassword5" placeholder="Password Confirm">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" id="register">注册</button>
    </div>
  </div>
</form>

	<!-- ajax提交当前表单 -->
 <script type="text/javascript" src="{{ URL::asset('/static/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript">
  $(function(){
    $('#register').on('click',function(){
      //用ajax提交用户信息
      $.ajax({
        type: 'post',
        url: "{{url('home/insert')}}",
        data: $('#login').serialize() ,

        dataType: 'json',

        success: function(data){
          switch (data.status)
          {
            case 1:
              alert(data.message);
              window.location.href = "{{url('home/index')}}";
            break;
            case 0:
            case -1:
              alert(data.message);
              window.location.back();
            break;
          }

        }
      })
  })
  })
</script>

@endsection
