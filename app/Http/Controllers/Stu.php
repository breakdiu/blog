<?php

namespace App\Http\Controllers;
use App\Models\Stu as StuModel;
use Illuminate\Http\Request;

class Stu extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $stu= StuModel::get();

        return view('stu/stu_list',['stu'=>$stu]);
//        return view('stu_list')->with('$stu',$stu);
//        return view('stu_list',campate('stu'));
    }


    public function add()
    {
        //
        return view('add');
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
        $input=$request->except('_token');
        $input['password']= md5($input['password']);

        $res = StuModel::create($input);
        dd($res);
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
      $user=  StuModel::find($id);
        return view('stu/stu_edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null)
    {
        //
//       $input = $request->all();
        $input=$request->except('_token');

        $input['password']= md5($input['password']);
        $res= StuModel::find($input['id'])->update($input);
//        dd($input);
        if ($res){
            return redirect('stu');
        }else{
            back();
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
        StuModel::destroy($id);

        return redirect('stu');
    }
}
