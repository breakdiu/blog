@extends('admin.public.layout')
@section('content')
<h4 class="text-center text-danger">编辑用户信息</h4>
<form class="form-horizontal" action="{{url('admin/user/update')}}" method="post">
    {{ method_field('put') }}
    {{csrf_field()}}

  <div class="form-group">
    <label class="col-sm-2 control-label">用户名:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{$userInfo->name}}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">邮箱:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="{{$userInfo->email}}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">手机:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mobile" value="{{$userInfo->mobile}}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">密码:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" value="" placeholder="新密码">
    </div>
  </div>
  <!-- 将当前用户的id做为隐藏域悄悄的传到服务器上 -->
  <input type="hidden" name="id" value="{{$userInfo->id}}">

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">保存</button>
    </div>
  </div>
</form>
@endsection





