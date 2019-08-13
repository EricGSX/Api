<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Libs\Api;

class UserController extends BaseController
{

    public function __construct (Request $request)
    {
        parent::__construct($request);
    }

    public function test()
    {
        return response()->json(json_decode($this->webPayLoad,true));
    }

}
