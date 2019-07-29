<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jwt\GuoJwt;

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
            $payLoad = [
                'name' => 'eric.guo',
                'email'=> 'eric.guo@oceania-inc.com',
                'role' => 'administrator',
                'iat'  => time(),
                'exp'  => time() + 3600
            ];
            $token=$jwt->getToken($payLoad);
            return response()->json(['code' => 200, 'token'=> $token],200);
        }catch (\Exception $e){
            return response()->json([
                'code' => 403, 'msg'  => $e->getMessage(),],403);
        }
    }

    public function show()
    {
        return view('users.login');
    }
}
