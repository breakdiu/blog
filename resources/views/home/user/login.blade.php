@extends('home.public.base')

@section('body')
	<!-- 主体 -->
	<div class="row">
		<!-- 左侧8列 -->
		<div class="col-md-8">
		<!-- 页头 -->
		<div class="page-header">
  			<h2>用户登录</h2>
		</div>
		<!-- 注册表单:采用水平表单 -->
		<form class="form-horizontal" method="post" id="login"  action="{{url('home/dologin')}}">


            {{csrf_field()}}
            {{--        <input type="hidden" value="{{csrf_token()}}" name="_token">--}}
            <div class="form-group">
                @if(count(array($errors)) > 0)
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <div class="center alert alert-danger " role="alert">
                                <strong>遇到错误: </strong>
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <strong>遇到错误: </strong>
                        {{ $errors }}
                    @endif
                @endif
                <label for="inputEmail3" class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">

                    <img src="{{url('admin/getCaptcha')}}" style="float: right"  onclick="this.src='/admin/getCaptcha?'+Math.random()" title="点击图片重新获取验证码">
                    <input name="captcha" class="form-control" style="width: 150px;" placeholder="验证码">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-inline">登录</button>
                </div>
            </div>

        </form>
	<!-- ajax提交当前表单 -->
{{--<script type="text/javascript">--}}
{{--  $(function(){--}}
{{--    $('#submit').on('click',function(){--}}
{{--      //用ajax提交用户信息--}}
{{--      $.ajax({--}}
{{--        type: 'post',--}}
{{--        url: "{:url('loginCheck')}",--}}
{{--        data: $('#login').serialize(),--}}
{{--        dataType: 'json',--}}
{{--        success: function(data){--}}
{{--          switch (data.status)--}}
{{--          {--}}
{{--            case 1:  //登录成功跳到首页--}}
{{--              alert(data.message);--}}
{{--              window.location.href = "{:url('index/index')}";--}}
{{--            break;--}}
{{--            case 0:  //失败或验证不通过返回登录页--}}
{{--            case -1:--}}
{{--              alert(data.message);--}}
{{--              window.location.back();--}}
{{--            break;--}}
{{--          }--}}

{{--        }--}}
{{--      })--}}
{{--  })--}}
{{--  })--}}
{{--</script>--}}
@endsection
