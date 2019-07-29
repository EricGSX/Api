<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{

    public function __construct (Request $request)
    {
        parent::__construct($request);
    }

    public function test()
    {
        return $this->jwtCode;
    }
}
