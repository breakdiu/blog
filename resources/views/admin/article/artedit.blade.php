@extends('admin.public.layout')
@section('content')
<h4 class="text-center text-danger">编辑文章</h4>
<!-- 使用前台添加文章的模板 -->
<form action="{{url('article/store')}}" enctype="multipart/form-data" method="post">
                <!-- 用隐藏域向服务器传送文章的d -->
            @csrf
          @method('put')
                <input type="hidden" name="id" value="{{$art->id}}">

                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$art->title}}">
                </div>
                <div class="form-group">
                    <label>分类</label>
                    <select class="form-control" name="cate_id"> <!--name与字段名对应-->
                       @foreach($cate as $v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group" >
                <label>内容</label>

                <textarea id="editor"  class="form-control" placeholder="文章内容" id="content" name="content" style="min-height: 250px;">
                   {{$art->content}}
                </textarea>
                </div>

                <img src="\uploads\{{$art->title_img}}" width="100" class="img-rounded">
                <div class="form-group">
                    <label for="title_img">标题图片</label>
                    <input type="file" name="title_img" id="title_img">
                    <p class="help-block"></p>
                </div>
                <!-- 这里使用原生的post提交 -->
                <button type="submit" class="btn btn-primary">保存</button>
            </form>


            <script type="text/javascript">
              var editor = $('#editor')
              if (editor.attr('id') !== undefined)
              {
                bkLib.onDomLoaded(function()
                {
                new nicEditor({
                    iconsPath : '/static/nicedit/nicEditorIcons.gif'
                }).panelInstance('editor')
                })
              }
            </script>


@endsection
