<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jwt\GuoJwt;
class ApiController extends Controller
{
    public function createJwt()
    {
        header("Content-Security-Policy: upgrade-insecure-requests");
        header('Access-Control-Allow-Origin:*');
        $key = env('APP_KEY');
        $jwt = new GuoJwt($key);
        $payLoad = \request()->all();
        $token=$jwt->getToken($payLoad);
        echo json_encode(['code'=>200,'msg'=>$token]);
    }

    public function checkJwt()
    {
        header("Content-Security-Policy: upgrade-insecure-requests");
        header('Access-Control-Allow-Origin:*');
        $token = \request()->token;
        $key = env('APP_KEY');
        $jwt = new GuoJwt($key);
        $re = $jwt->verifyToken($token);
        echo $re;
    }
}
