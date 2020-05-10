@extends('home.public.base')
@section('body')
	<!-- 主体 -->
	<div class="row">
		<!-- 左侧8列 -->
		<div class="col-md-8">
		<!-- 页头 -->
		<div class="page-header">
{{--  			<h2>{$cateName}</h2>--}}
            <h2>全部文章</h2>
		</div>
	@foreach($arts as $v)
		<div>
            <img class="img-rounded" src="/uploads/{{$v->title_img}}"
            style="margin-right: 10px;float: left;width: 100px;height: 85px"/>
            <div class="content-detail" style="float: left;width: 80%">
              <!-- 获取当前文章的id -->
             <h4><a href="{{url('home/show',['id'=>$v->id])}}">{{$v->title}}</a></h4>
                <p>作者:{{$v['user_id']}}&nbsp;&nbsp;
               发布时间：{{date('Y-m-d H:i:s',$v->create_time)}}&nbsp;&nbsp;
               </p>
               <div>{{mb_substr(strip_tags($v->content),0,30)}}</div>
              <hr/>
          </div>
   		</div>
         @endforeach

        <div class="text-center">{{ $arts->links() }}</div>
@endsection
