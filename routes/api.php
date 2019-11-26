<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login','User\LoginController@login');

Route::group(['middleware'=>'check_jwt'],function(){
    Route::get('/user2',function(){
        return 'ok';
    });
    Route::get('/user','User\UserController@test');
    Route::get('/test','Erp\SalesController@test');
});

//接口
Route::post('/token','Api\ApiController@createJwt');
Route::post('/token/check','Api\ApiController@checkJwt');