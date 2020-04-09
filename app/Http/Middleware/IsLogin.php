<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->get('user')){
            return $next($request);
           view()->share('user', session()->get('user'));
        }else{
            return redirect('admin/login')->with('errors','请登录后访问');
        }

    }


}
