<nav class="navbar navbar-default navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('home/index')}}">社区问答</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li
{{--                    {//当URL中cate_id参数为空的时候,默认就是首页高亮显示}--}}
                {empty name="$Request.param.cate_id"}
                class="active"
                {/empty}
                ><a href="{{url('home/index')}}">首页</a></li>
                @foreach($cate as $v)
                <li
{{--                    {//用请求对象从URL中获取当前的cate_id参数}--}}

                @if($v->id==$v->id)

                class="active"
           @endif


                ><a href="{{url('home/index/'.$v->id)}}">{{$v->name}}</a></li>
               @endforeach

            </ul>
            <!-- 将搜索表单放在右边 -->

            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" action="{{url('home/index')}}" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="输入关键字" name="keywords">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <!-- 根据session判断用户是否登录,显示不同的内容 -->
                @if(session('user'))
                <li><a href="{{url('admin/user/'.session()->get('user')->id.'/edit')}}">{{session()->get('user')->name}}</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">操作<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('home/create')}}">发布文章</a></li>
                        <li role="separator" class="divider"></li>
                        <!-- 跳转到后台的管理中心 -->
                        <li>
                            <a
                                href="{{url('admin/user')}}">管理中心</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('home/logout')}}">退出登录</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{url('home/login')}}">登录</a></li>

                <li><a href="{{url('home/register')}}">注册</a></li>


               @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
