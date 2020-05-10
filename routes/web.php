<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin模块
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'isLogin'],function (){
//    Route::get('index','UserController@index');
    //退出登录
    Route::get('logout','LoginController@logout');

    //后台用户模块路由
    Route::resource('user','UserController');
    //分类资源路由
    Route::resource('cate','CategoryController');
    //文章路由
    Route::resource('article','ArticleController');

});
Route::get('admin/site/edit','admin\Site@edit');
Route::put('admin/site/update','admin\Site@update');

//登录
Route::get('admin/login','admin\LoginController@login');

Route::post('admin/dologin','admin\LoginController@doLogin');
Route::get('admin/getCaptcha','admin\LoginController@getCaptcha');
Route::get('admin/cate/destroy/{id}','admin\CategoryController@destroy');
Route::get('admin/article/destroy/{id}','admin\ArticleController@destroy');
//Home模块
Route::group(['prefix'=>'home','namespace'=>'home','middleware'=>'Ready'],function () {
    Route::get('login', 'LoginController@login');
    Route::post('insert', 'LoginController@insert');
    Route::get('register', 'LoginController@register');
    Route::get('index/{id?}', 'IndexController@index');
    Route::get('create', 'IndexController@create');
    Route::get('show/{id}', 'IndexController@show');
    Route::post('store', 'IndexController@store');
    Route::post('dologin', 'LoginController@doLogin');
});
//加密
Route::get('admin/jiami','admin\LoginController@jiami');
Route::get('/', function () {
   return view('welcome');

});
Route::get('testRedis','RedisController@testRedis')->name('testRedis');
Route::get('/stu','Stu@index');
Route::get('/stu/edit/{id}','Stu@edit');
Route::get('/stu/add','Stu@add');
Route::get('/stu/destroy/{id}','Stu@destroy');
Route::get('/user','UserController@index');
Route::get('/stu/getCaptcha','stu@getCaptcha')->name('getCaptcha');
Route::post('/stu/store','Stu@store');
Route::post('/stu/update','Stu@update');

//上传路由pretest;
Route::post('/stu/upload','Stu@upload');
Route::resource('stu','Stu');
