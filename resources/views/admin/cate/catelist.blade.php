@extends('admin.public.layout')
@section('content')
<h4 class="text-success text-center">分类管理</h4>

<table class="table table-striped table-hover text-center">
	<tr>
		<td>ID</td>
		<td>栏目名称</td>
		<td>排序</td>
		<td>状态</td>
		<td>创建时间</td>
		<td colspan="2">操作</td>
	</tr>
	@foreach($cate as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->name}}</td>
		<td>{{$v->sort}}</td>

		<td>
		@if($v->status==1)
		<span style="color:forestgreen">显示</span>
		@else
		<span style="color:gray">隐藏</span>
		@endif
		</td>

		<td>{{$v->create_time}}</td>

		<td><a href="{{url('admin/cate/'.$v->id.'/edit')}}">编辑</a></td>
		<td><a href="javascript:if(confirm('{{ __('您真的要删除吗') }}?'))location.href='{{url('admin/cate/destroy',['id'=>$v->id])}}'">删除</a></td>
	</tr>
	@endforeach
</table>
<!-- 分类需要添加操作 -->
<a class="btn btn-info" href="{{url('admin/cate/create')}}" role="button">添加分类</a>

{{--<script>--}}
{{--	function dele()--}}
{{--	{--}}
{{--		if(confirm('您真的要删除吗?') == true){--}}
{{--			window.location.href = "{{url('admin/cate/destroy',['id'=>$v->id])}}"--}}
{{--		}--}}
{{--	}--}}
{{--</script>--}}
@endsection




