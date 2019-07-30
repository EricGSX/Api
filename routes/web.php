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
// 前台页面路由入口
Route::get('/', 'User\LoginController@show');
Route::get('/users', 'User\LoginController@show');
Route::get('/usersDetail','User\LoginController@detail');