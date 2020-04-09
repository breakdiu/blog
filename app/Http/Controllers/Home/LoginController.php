<?php

namespace App\Http\Controllers\Home;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(){

        return view('home.user.login');
    }

    public function register(){

        return view('home.user.register');
    }
    public function insert(Request $request){
//        return 1111;
//        接收数据
       $input= $request->except('_token');
//       dd($input);
       //进行表单验证
//        添加到数据库的user表
        $email=$input['email'];
$input['password']= Crypt::encrypt($input['password']);

$res= User::create($input);
if ($res){
    $data=[
        'status'=>1,
        'message'=>'添加成功',
    ];

}else{
    $data=[
        'status'=>0,
        'message'=>'添加失败',
    ];
}
        return $data;


//        $input=json_decode ($request->all (),true);
//        dd($input);

    }
    /** @noinspection PhpUndefinedMethodInspection */
    public function doLogin(Request $request)
    {
        $input=$request->except('_token');
//           dd($input);
        //进行表单验证
        //$validator=Validator::make('需要验证的表单数据'，‘验证规则’，‘错误信息提示’);
        $rule=
            [

                'email' => 'required|between:4,18',
                'password' => 'required|between:4,18|alpha_dash',
                'captcha' => 'required', 'captcha',
            ];
        $msg=[
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ];


        $validator=Validator::make($input,$rule,$msg);
//        dd($validator);
        if ($validator->fails()) {
            return redirect('home/login')
                ->withErrors($validator)
                ->withInput();
        }
        //验证此用户
        //验证码
//        dd($input);
//        dd(session()->get('captcha'));
        if (strtolower($input['captcha'])!=strtolower(session()->get('captcha'))){

            return redirect('admin/login')->with('errors','验证码错误');
        }
        $user=User::where('email',$input['email'])->first();
//        dd($user);
//         dd(Crypt::decrypt($user->password));
        if(!$user){
            return redirect('home/login')->with('errors','用户名不正确');
        }
        if ($input['password']!=Crypt::decrypt($user->password)){
            return redirect('home/login')->with('errors','密码不正确');
        }

        //写入session
        session()->put('user',$user);
//        dd(session()->get('user'));


        //跳转到后台首页
        return redirect('home/index');

    }

    public function logout()
    {
        //清空session中的用户信息
        session()->flush();

        //跳转到登陆页面
        return redirect('home/login');
    }
}
