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
    return view('welcome');
});

Route::get('/home',function(){
    $data=App\DailyTask::all();
    return view('home')->with('home',$data);
});

Route::post('/store','TaskController@store');

Route::get('/mark/{id}','TaskController@markFun');

Route::get('/marknot/{id}','TaskController@marknotFun');

Route::get('/delete/{id}','TaskController@deleteFun'); 

Route::get('/up/{id}','TaskController@updateTask');


//Route::get('/up', function () {
//    return view('#');
//});

Route::post('/updateTask1','TaskController@updateTaskNew');
