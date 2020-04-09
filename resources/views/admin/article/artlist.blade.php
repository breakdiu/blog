@extends('admin.public.layout')
@section('content')
<h4 class="text-success text-center">文章管理</h4>

<table class="table table-striped table-hover text-center">
	<tr>
		<td>ID</td>
		<td>标题</td>
		<td>栏目</td>
        @if(session()->get('user')->is_admin==1)
		<td>作者</td>
	    @endif
		<td>阅读量</td>
		<td>创建时间</td>
		<td colspan="2">操作</td>
	</tr>
	@foreach($artList as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td class="text-left">{{$v->title}}</td>
		<td>{{$v->name}}</td>

        @if(session()->get('user')->is_admin==1)
		<td>{{$v->username}}</td>
		@endif
		<td>{{$v->pv}}</td>
		<td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
		<td><a href="{{url('admin/article/'.$v->id.'/edit')}}">编辑</a></td>
		<td><a href="javascript:if(confirm('{{ __('您真的要删除吗') }}?'))location.href='{{url('admin/article/destroy',['id'=>$v->id])}}'">删除</a></td>
	</tr>
	@endforeach
</table>

<!-- 显示分页条 -->
<div class="text-center">{{ $artList->links() }}</div>


{{--<script>--}}
{{--	function dele(id)--}}
{{--	{--}}
{{--		if(confirm('您真的要删除吗?') == true){--}}
{{--			window.location.href = "{{url('article/destroy')}}"+"?id="+id;--}}
{{--		}--}}
{{--	}--}}
{{--</script>--}}

@endsection



