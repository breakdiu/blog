<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function testRedis()
    {

//set存数据 创建一个 key 并设置value
        Redis::set('key','value');

//get命令用于获取指定 key 的值,key不存在,返回null,如果key储存的值不是字符串类型，返回一个错误。
        var_dump(Redis::get('key'));

//del 删除 成功删除返回 true, 失败则返回 false
        Redis::del('key');

//mset存储多个 key 对应的 value
        $array= array(
            'user1'=>'张三',
            'user2'=>'李四',
            'user3'=>'王五'
        );
        redis::mset($array); // 存储多个 key 对应的 value


        var_dump(redis::mget (array_keys( $array))); //获取多个key对应的value
//Strlen 命令用于获取指定 key 所储存的字符串值的长度。当 key存储不是字符串，返回错误
        var_dump(redis::strlen('key'));

//substr 获取第一到第三位字符
        var_dump(Redis::substr('key',0,-1));

        var_dump(Redis::keys('use*'));//模糊搜索

        var_dump(Redis::ttl('str2'));//获取缓存时间

        var_dump( Redis::exists ( 'foo' )) ; //true
        var_dump(Redis::lrange ('array', 0, -1)); //返回第0个至倒数第一个, 相当于返回所有元素
        //定义一个变量，存放所有的文章记录
//          $arts=[];
//
//
////        $article=Article::paginate(5);
//        $listkey='LIST:ARTICLE';
//        $hashkey='HASH:ARTICLE';
//        //redis中存在要取的文章
//        if (Redis::exists($listkey)){
//            //存放所有要获取文章的id
//            $lists=Redis::lrange($listkey,-1,0);
////             dd( $lists);
//            foreach ($lists as $k=>$v){
//
//                $arts[]=Redis::hgetall($hashkey.$v);
//
//            }
//        }else{
////            连接MySQL数据库，获取需要的数据
//            $arts=Article::paginate(5);
//
////           dd($arts);
////         将数据存入ridis
//           foreach ($arts as $k=>$v){
////               将文章的id添加到listkey变量中
//           Redis::rpush($listkey,$v['id']);
//           //将文章添加到hashkey变量中
//               Redis::hmset($hashkey,$v['id'],$v);
//
//           }
//        }

    }
}
