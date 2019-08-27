<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jwt\GuoJwt;
use App\Libs\Api;

/**
"iss": "Eric",　　　                 #该JWT的签发者
"iat": 1441593502,　　　　           #在什么时候签发的
"exp": 1441594722,　　　             #什么时候过期，这里是一个Unix时间戳
"aud": "www.example.com",　　        #接收该JWT的一方
"sub": "eric.guo@oceania-inc.com",　 #该JWT所面向的用户
"username": "A"　　　　               #私有字段
 */
class LoginController extends Controller
{
    public function login()
    {
        try{
            $key = env('APP_KEY');
            $jwt = new GuoJwt($key);
            $api = new Api();
            if(true){
                $payLoad = [
                    'name' => 'eric.guo',
                    'email'=> 'eric.guo@oceania-inc.com',
                    'role' => 'administrator',
                    'iat'  => time(),
                    'exp'  => time() + 3600
                ];
                session()->put('username','eric.guo');
                session()->save();
                $token=$jwt->getToken($payLoad);
                return response()->json(['code' => 200, 'token'=> $token]);
            }else{
                return response()->json(['code' => 403, 'msg'  => '账号密码错误']);
            }
        }catch (\Exception $e){
            return response()->json([
                'code' => 403, 'msg'  => $e->getMessage(),]);
        }
    }

    public function index()
    {
        return view('users.login');
    }

    public function show(Request $request)
    {
        if(!$request->token){
            return redirect('/roles/list');
        }
        $authToken = $request->token;
        session()->put('AuthToken',$authToken);
        session()->save();
        \App\Http\Controllers\BaseController::webAuthTokenCheck();
        return view('users.userdetail');
    }

    public static function testApiConnect(Request $request)
    {
        $api = new Api();
        $result = $api->httpRequest('http://192.168.11.146:888/Home/Test');
        dd($result);
    }
}
