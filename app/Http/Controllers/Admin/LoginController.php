<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Session;
class LoginController extends Controller
{
    //
    public function login(){

        return view('admin.user.login');
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
            return redirect('admin/login')
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
            return redirect('admin/login')->with('errors','用户名不正确');
        }
        if ($input['password']!=Crypt::decrypt($user->password)){
            return redirect('admin/login')->with('errors','密码不正确');
        }

        //写入session
      session()->put('user',$user);
//        dd(session()->get('user'));


        //跳转到后台首页
      return redirect('admin/user');

    }

    public function logout()
    {
        //清空session中的用户信息
        session()->flush();

        //跳转到登陆页面
        return redirect('admin/login');
    }
    public function getCaptcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象,配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色25,25,112
        $builder->setBackgroundColor(25, 25, 112);
        // 设置倾斜角度
        $builder->setMaxAngle(25);
        // 设置验证码后面最大行数
        $builder->setMaxBehindLines(10);
        // 设置验证码前面最大行数
        $builder->setMaxFrontLines(10);
        // 设置验证码颜色
        $builder->setTextColor(255, 255, 0);
        // 可以设置图片宽高及字体
        $builder->build($width = 130, $height = 40, $font = null);

        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session()->put('captcha', $phrase);

//       dd( session()->get('captcha', $phrase));
        // 生成图片
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type:image/jpeg');
        $builder->output();


    }
    public function jiami(){

        //1.md5加密，生成一个32位的字符串
//        $str='salt'.'123456';
//        return md5($str);
        //哈希加密
//        $str= '123456';
//       return \Hash::make($str);
//                $str= '123456';
//       $hash= \Hash::make($str);
//       if(\Hash::check($str,$hash)){
//           return '密码正确';
//       }else{
//           return '密码错误';
//       }
        //crypt加密
//        $str='123456';
//        $crypt_str=Crypt::encrypt($str);
//        return $crypt_str;
//        $str='123456';
//        $crypt_str=eyJpdiI6IlZ1TVAwQm1ETW45bTlLVUFkMXNOTVE9PSIsInZhbHVlIjoiSUxnamswVCtsVVg3bUxLd3I5am1JUT09IiwibWFjIjoiODIzNDU2NWZiNGM3NjdiYWE0MjUyMjVlODFmMDU1MWY3M2Y3OWYxZDU1MGJlODlmMTM3M2FkNTk1NDA4ZTEwZCJ9;
//        if(Crypt::decrypt($crypt_str)==$str){
//            return "密码正确";
//        }
   }
}
