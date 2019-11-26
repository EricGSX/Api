<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jwt\GuoJwt;
class ApiController extends Controller
{
    public function createJwt()
    {
        $key = env('APP_KEY');
        $jwt = new GuoJwt($key);
        $payLoad = [
            'iat'         => time(),
            'exp'         => time() + 36000
        ];
        $token=$jwt->getToken($payLoad);
        echo json_encode(['code'=>200,'msg'=>$token]);
    }

    public function checkJwt()
    {
        $token = \request()->token;
        $key = env('APP_KEY');
        $jwt = new GuoJwt($key);
        $re = $jwt->verifyToken($token);
        echo $re;
    }
}
