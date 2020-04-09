@include('admin.public.header')
				<!-- 顶部导航 -->

@include('admin.public.nav')
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 text-center">
				<!-- 左侧菜单 -->

  @include('admin.public.left')
			</div>
			<!-- 右侧功能区 -->
			<div class="col-md-10">
				<!-- 用户自定义区块 -->
                @section('content')

                @show
			</div>
		</div>

</div>
</body>
</html>
