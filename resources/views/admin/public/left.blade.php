<!-- 左侧4列 -->
<!-- 非超级管理员是不允许进行系统管理操作的 -->
@if(session()->get('user')->is_admin==1)
<ul class="nav nav-pills nav-stacked">
	<li class="nav-header h3">系统管理</li>
	<li>
		<a href="{{url('admin/site/edit')}}"><span class="glyphicon glyphicon-cog"></span>&nbsp;网站管理</a>
	</li>
</ul>
@endif
<ul class="nav nav-pills nav-stacked">
	<li class="nav-header h3">用户管理</li>
	<li><a href="{{url('admin/user')}}"><span class="glyphicon glyphicon-user"></span>&nbsp;用户列表</a></li>
</ul>

<ul class="nav nav-pills nav-stacked">
	<li class="nav-header h3">文章管理</li>
    @if(session()->get('user')->is_admin==1)
	<li><a href="{{url('admin/cate')}}"><span class="glyphicon glyphicon-lock"></span>&nbsp;分类管理</a></li>
	@endif
	<li><a href="{{url('admin/article')}}"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;文章管理</a></li>
</ul>



