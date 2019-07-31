<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jwt\GuoJwt;

class BaseController extends Controller
{
    protected $webPayLoad;
    protected $jwtCode;
    public function __construct (Request $request)
    {
        $headerAuthToken = $request->header('Authorization');
        if($headerAuthToken){
            $this->jwtCode = $headerAuthToken;
            $jwt = new GuoJwt(env('APP_KEY'));
            $this->webPayLoad = $jwt->verifyToken($this->jwtCode);
        }
    }

}
