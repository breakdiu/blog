<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cate=Category::select(
            '*'
        )
            ->orderBy('sort')

            ->paginate(10);
//        dd($cate);
        return view('admin.cate.catelist',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cate.cateadd');
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

        $input= $request->except('_token');
        $input['user_id']=session()->get('user')->id;
//        dd( $input['user_id']);
        $res=  Category::create($input);
        if($res){
            echo "添加成功";
            return redirect('admin/cate')->with('success','good');
        }else{
            echo "添加失败";
            return back();
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
     $cate=Category::find($id);
        return view('admin.cate.cateedit',compact('cate'));
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
        //
        $input=$request->except('_token');
//      dd( $input);


        $res= Category::find($input['id'])->update($input);
//        dd($input);
        if ($res){

            return redirect('admin/cate')->with('success','good');
        }else{
            back('admin/cate/edit');
        }

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

//        dd($id);
        $res=Category::destroy($id);
        if($res){
            return redirect('admin/cate');
        }else
        {
            return back();
        }
    }
}
