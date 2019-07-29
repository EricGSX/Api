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
        $this->jwtCode = $request->header('Authorization');
        $jwt = new GuoJwt(env('APP_KEY'));
        $this->jwtCode = $jwt->verifyToken($this->jwtCode);
    }

    public function jwtCode()
    {
        return $this->jwtCode();
    }
}
