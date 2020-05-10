<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Category;
class IndexController extends Controller
{

    public function index(Request $request,$id=null)
    {

        //设置全局查询条件
        $map = [];  //将当前页面的全部查询条件封装到一个条件数组中
        // 条件1:显示状态必须为1
        $map[] = ['status', '=', 1];  //等号必须要有,不允许省略

        //实现搜索功能
        $keywords = $request->input('keywords');
//      echo $keywords;
        if (!empty($keywords)) {
            //条件2: 模糊匹配查询条件
            $map[] = ['title', 'like', '%'.$keywords . '%'];
        }
//      print_r($map);
//
//        //分类信息显示
//        //1.获取到URL中的分类ID
       $cateId =   $id;
//  echo $cateId;
        //如果当前存在分类ID,再进行查询获取到分类名称
       if (isset($cateId)) {
//           print_r($map);
//            //条件3: 当前列表与当前栏目id对应,此时$map[]条件数组生成完毕
           $map[] = ['cate_id', '=', $cateId];

       }
           $arts = Article:: where($map)->paginate(5);

            return view('home.index.index', compact('arts'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  View('home.index.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $input=$request->except('_token');
        $file=$request->file('title_img');

        if (!$request->file('title_img')->isValid()){
            echo '<script>alert("无效的文件上传")</script>';
        }
        //获取源文件的文件扩展名
        $ext=$file->extension();
        //新文件名
        $newfile=md5(time().rand(1000,9999)).'.'.$ext;
        //文件上传的指定路径
        $path=public_path('uploads');
        //将文件从临时目录移动到指定目录
        if( !$path = $file->move($path,$newfile)){
            echo '<script>alert("文件上传失败")</script>';
        }else{
            echo '<script>alert("文件添加成功")</script>';
            $input['title_img']=$newfile;
            $input['user_id']=session()->get('user')->id;
            $res=Article::create($input);
            if($res){
                echo '<script>alert("发表成功")</script>';
                return redirect('home/index');
            }else{
                echo '<script>alert("发表失败")</script>';
                return redirect('home/create');
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $article=Article::find($id);


       $art_u= User::find($article->user_id)->value('name');
//       dd($art_u);
        $art_c= Category::find($article->cate_id)->value('name');

        return view('home.index.detail',compact('article','art_u','art_c'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request)
    {
        $file=$request->files('title_img');

        if (!$file->isVolid()){
            echo '<script>alert("无效的文件上传")</script>';
        }
        //获取源文件的文件扩展名
        $ext=$file->getClientOriginalExtendsion();
        //新文件名
        $newfile=md5(time().rand(1000,9999).'.'.$ext);
        //文件上传的指定路径
        $path=public_path('uploads');
        //将文件从临时目录移动到指定目录
      if( !$path = $file->move($path,$newfile)){
          echo '<script>alert("文件上传失败")</script>';
      }else{
          echo '<script>alert("无效的文件成功")</script>';
      }

    }

}
