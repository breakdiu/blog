<!-- 右侧4列 -->
	</div>
		<div class="col-md-4">
			<div class="page-header"> <h2>热门浏览</h2> </div>
			<!-- 列表使用:列表组来做 -->
			<div class="list-group">
				@foreach($hot as $v)
				<a href="{:url('detail',['id'=>$art.id])}" class="list-group-item

				@if($i=1)
				active
				@endif


					">{{$v->title}}<span class="badge">{{$v->pv}}</span></a>
				@endforeach
			</div>

		</div>
