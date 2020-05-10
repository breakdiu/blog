<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
{{--      <a class="navbar-brand" href="{:url('index/index')}">{$title|default="后台管理"}</a>--}}
        <a class="navbar-brand" href="{:url('index/index')}">后台管理</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



      <ul class="nav navbar-nav navbar-right">

      <!-- 根据session判断用户是否登录,显示不同的内容 -->
   @if(session()->get('user'))
        <li><a href="{{url('admin/user/'.session()->get('user')->id.'/edit')}}">{{session()->get('user')->name}}</a></li>
        <li><a href="{{url('home/index')}}">回到首页</a></li>
      <li><a href="{{url('admin/logout')}}">退出登录</a></li>
       @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
