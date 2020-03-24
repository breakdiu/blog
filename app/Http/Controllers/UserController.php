<?php

namespace App\Http\Controllers;
use DB;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Stu;

class UserController extends Controller
{

public function index(){
echo "000";
   ;
}
public function add(){

    return view('add');
}
public function store(Request $request){
    $input=$request->except('_token');
     $input['password']= md5($input['password']);

     $res = Stu::create($input);
     dd($res);


    }


}
