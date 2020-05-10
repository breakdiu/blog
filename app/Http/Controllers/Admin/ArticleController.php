<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userIfo=session()->get('user');
//        dd($userIfo);
        $userId=$userIfo['id'];
        $isAdmin=$userIfo->is_admin;
//        dd($isAdmin);
        if($isAdmin==0){
            $artList=Article:: join('article_category', 'article.cate_id', '=', 'article_category.id')
                ->join('user', 'user.id', '=', 'article.user_id')
                ->select('user.name as username','article.*','article_category.*')
                ->where('article.user_id',$userId)->paginate(5);
        }else{
            $artList=Article::join('article_category', 'article.cate_id', '=', 'article_category.id')
                ->join('user', 'user.id', '=', 'article.user_id')
                ->select('article.*','user.name as username','article_category.name')
                ->paginate(5);
        }

//       $artList = Article::when($isAdmin,$userId,function ($query)use ($isAdmin,$userId){
//           return $query->where('user_id', $userId);
//       })->paginate(5)->get();
//       dd($artList);
        return view('admin.article.artlist',compact('artList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $cate=Category::get();
        $art=Article::find($id);
    //dd($art);
        return view('admin.article.artedit',compact('art','cate'));
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

        $res=Article::destroy($id);
        if($res){
            return redirect('admin/article');
        }else
        {
            return back();
        }
    }
}
