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
Route::get('/stu','Stu@index');
Route::get('/stu/edit/{id}','Stu@edit');
Route::get('/stu/add','Stu@add');
Route::get('/stu/destroy/{id}','Stu@destroy');
Route::get('/user','UserController@index');
Route::post('/stu/store','Stu@store');
Route::post('/stu/update','Stu@update');
Route::get('/', function () {

   return view('welcome');

});
