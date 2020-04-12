<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //定义一个变量，存放所有的文章记录


          $arts=[];


//        $article=Article::paginate(5);
        $listkey='LIST:ARTICLE';
        $hashkey='HASH:ARTICLE';
        //redis中存在要取的文章
        if (Redis::exists($listkey)){
            //存放所有要获取文章的id
            $lists=Redis::lrange($listkey,-1,0);
//             dd( $lists);
            foreach ($lists as $k=>$v){

                $arts[]=Redis::hgetall($hashkey.$v);

            }
        }else{
//            连接MySQL数据库，获取需要的数据
            $arts=Article::paginate(5);

//           dd($arts);
//         将数据存入ridis
           foreach ($arts as $k=>$v){
//               将文章的id添加到listkey变量中
           Redis::rpush($listkey,$v['id']);
           //将文章添加到hashkey变量中
               Redis::hmset($hashkey,$v['id'],$v);

           }
        }

        $art=Article::paginate(5);
        return view('home.index.index',compact('arts','art'));
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
