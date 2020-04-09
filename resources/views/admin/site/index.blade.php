@extends('admin.public.layout')
@section('content')
<h4 class="text-danger text-center">站点管理</h4>

<form action="{{url('admin/site/update')}}" method="post">
{{ method_field('put') }}
{{csrf_field()}}
	<!-- 用隐藏域向服务器传idd -->
	<input type="hidden" name="id" value="{{$site->id}}">

	<div class="form-group">
	    <label for="title">网站名称</label>
	    <input type="text" name="title" class="form-control" id="title" value="{{$site->title}}">
	</div>

	<div class="form-group">
	    <label for="keywords">关键字:</label>
	    <input type="text" name="keywords" class="form-control" id="keywords" value="{{$site->keywords}}">
	</div>

	<div class="form-group" >
	<label>网站描述</label>
	<textarea id="editor"  class="form-control" placeholder="文章内容" id="content" name="desc" style="min-height: 100px;">{{$site->desc}}</textarea>
	</div>

{{--	网站是否关闭--}}
	<div class="form-group">
    <label">网站是否开启:</label>
      <label class="radio-inline">
        <input type="radio" name="is_open"  value="1"
{{--      {//如果当前是开启则将它置为选中状态}--}}
            @if($site->is_open==1)
        checked=""
      @endif
        > 开启
      </label>
      <label class="radio-inline">
        <input type="radio" name="is_open"  value="0"
               @if($site->is_open==0)

        checked=""
     @endif

        > <span class="text-danger">关闭</span>
      </label>
	</div>

    @if($site->is_open==1)
	<div class="form-group">
    <label">是否允许注册:</label>
      <label class="radio-inline">
        <input type="radio" name="is_reg"  value="1"
               @if($site->is_reg==1)
        checked=""
     @endif

        > 允许
      </label>
      <label class="radio-inline">
        <input type="radio" name="is_reg"  value="0"
               @if($site->is_reg==0)
        checked=""
      @endif



        > <span class="text-danger">禁止</span>
      </label>
	</div>

	@endif










	<!-- 这里使用原生的post提交 -->
	<button type="submit" class="btn btn-primary">保存</button>
</form>



@endsection




