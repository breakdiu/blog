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
Route::get('/', function () {
//    $users=\App\Stu::all()->toArray();
//    foreach ($users as $user){
//        echo $user[name];

    //}
   return view('welcome');

});

//Route::get('student/{name}', function ($name) {
//    return $name;
//
//});
//Route::get('students/{id}', function ($id){
// dd(123);
//
//});
//Route::get('user1','UserController@index');
//Route::get('user2','UserController');
//Route::resource('photos', 'PhotoController');
