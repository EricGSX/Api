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
Route::group(['middleware'=>['web']],function(){
    // 前台页面路由入口
    Route::get('/', 'User\LoginController@index');
    Route::get('/login', 'User\LoginController@index');
    Route::get('/users/1','User\LoginController@show');
    Route::get('/test','User\LoginController@testApiConnect');


    //后台页面入口

    //销量下降
    Route::get('/sales/decline','Erp\SalesController@index');
    Route::get('/sales/declineDetail','Erp\SalesController@show');
    //权限分配
    Route::get('/roles','Erp\RolesController@index');
    Route::get('/roles/create','Erp\RolesController@create');
    Route::post('/roles/create','Erp\RolesController@store');
    Route::post('/roles/assign','Erp\RolesController@assignRoles');
    Route::get('/roles/list','Erp\RolesController@roleLists');

    //配置缓存
    Route::get('/configs','Erp\ConfigsController@index');
    Route::get('/configs/roles','Erp\ConfigsController@rolesTree');
});
