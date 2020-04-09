@extends('admin.public.layout')
@section('content')
<h4 class="text-center text-danger">编辑分类信息</h4>
<form class="form-horizontal" action="{{url('/admin/cate/update')}}" method="post">
    {{ method_field('put') }}
    {{csrf_field()}}
  <div class="form-group">
    <label class="col-sm-2 control-label">名称:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="{{$cate->name}}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">排序:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="sort" value="{{$cate->sort}}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">状态:</label>
    <div class="col-sm-10">
      <label class="radio-inline">
        <input type="radio" name="status"  value="1"
{{--      {//如果当前是显示则将它置为选中状态}--}}
      @if($cate->status==1)
        checked=""
    @endif

        > 显示
      </label>
      <label class="radio-inline">
        <input type="radio" name="status"  value="0"
{{--      {//如果当前是隐藏则将它置为选中状态}--}}
@if($cate->status==0)
        checked=""
            @endif

        > 隐藏
      </label>

    </div>
  </div>


  <!-- 将当前栏目的id做为隐藏域上传 -->
  <input type="hidden" name="id" value="{{$cate->id}}">

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">保存</button>
    </div>
  </div>
</form>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection





