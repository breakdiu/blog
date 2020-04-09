<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{$title|default="页面标题"}</title>

    @include('admin.public.style')
    @include('admin.public.script')


</head>
<body>
	<div class="container">

		<div class="row">

			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="page-header text-center">
					<h3>管理员登录</h3>
				</div>
				<form class="form-horizontal"
				 action="{{url('admin/dologin')}}" method="post">

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
							<button type="submit" class="btn btn-primary btn-block">登录</button>
						</div>
					</div>

				</form>

			</div>
			<div class="col-md-4">

			</div>
		</div>
	</div>

</body>

</html>
