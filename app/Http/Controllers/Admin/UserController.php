<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $user= User::get();
//        dd($user);


//       dd(session()->get('user'));
        return view('admin.user.userlist',compact('user'));

    }



//
//    public function destroy($id){

//
//
//    }


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

        $userInfo=User::find($id);
        return view('admin.user.useredit',compact('userInfo'));
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
        $input=$request->except('_token');
//        dd( $input);

        $input['password']= Crypt::encrypt($input['password']);
        $res= User::find($input['id'])->update($input);
//        dd($input);
        if ($res){
            return redirect('admin/index');
        }else{
            back('admin/user/edit');
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
        $user=User::find($id);
        $res=$user->delete();
        if ($res)
        {
            $data=[
                'status'=>1,
                'message'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>0,
                'message'=>'删除失败'
            ];
        }
        return  $data;
//        $res=User::destroy($id);
//        return redirect()->back();
    }
}
