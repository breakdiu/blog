@extends('admin.public.layout')
@section('content')
<h4 class="text-success text-center">用户管理</h4>

<table class="table table-striped table-hover text-center">
	<tr>
		<td>ID</td>
		<td>用户名</td>
		<td>邮箱</td>
		<td>手机号</td>
{{--		<td>注册时间</td>--}}
		<td>身份</td>
		<td>状态</td>
		<td colspan="2">操作</td>
	</tr>

    @foreach($user as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->name}}</td>
		<td>{{$v->email}}</td>
		<td>{{$v->mobile}}</td>
{{--		<td>{{$v->create_time}}</td>--}}
		<td>
            @if($v->is_admin==0)

		<span style="color:green">注册会员</span>

            @else
		<span style="color:red">超级管理员</span>
		@endif
		</td>
		<td>
            @if($v->status==1)

		<span style="color:green">正常</span>
	   @else
		<span style="color:red">禁用</span>
	   @endif
		</td>

		<!-- 非当前用户是不允许编辑其它用户资料的 -->

       @if($v->id==session()->get('user')->id)

		<td><a href="{{url('admin/user/'.$v->id.'/edit')}}">编辑</a></td>
         @endif
		<!-- 当前用户是不能自己删除自己的 -->
        @if($v->id!=session()->get('user')->id)
		<td><a href="" onclick="dele(this,{{$v->id}});return false;">删除</a></td>
		@endif
	</tr>
    @endforeach
{{--	{/volist}--}}
</table>

{{--<script type="text/javascript" src="{{ URL::asset('/static/js/jquery-3.3.1.min.js') }}"></script>--}}
<script>
	function dele(obj,id)
	{
        if(confirm('您真的要删除吗?') == true){
            $.post('/admin/user/'+id,{"_method":"delete","_token":"{{ csrf_token() }}"},function (data) {

                // console.log(data);
                if(data.status==1){
                    alert(data.message,setTimeout(1000));
                }else{
                    alert(data.message);
                    window.location.back();
                }

            })
        }
		{{--if(confirm('您真的要删除吗?') == true){--}}
		{{--	window.location.href = "{{ url('admin/user/destroy', [$v->id]) }}"--}}
		{{--}--}}
	}
</script>
@endsection
