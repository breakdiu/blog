<?php

namespace App\Http\Middleware;
use App\Models\Article;
use App\Models\Category;
use Closure;

class Ready
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

        $cate=Category::get();
        $hot=Article::where('is_hot','=',1)->get();
       view()->share('cate',$cate);
        view()->share('hot',$hot);
//        dd($hot);
        return $next($request);
    }
}
