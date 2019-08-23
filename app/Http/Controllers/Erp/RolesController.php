<?php

namespace App\Http\Controllers\Erp;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class RolesController extends BaseController
{
    public function index(Request $request)
    {
        $users = $request->user;
        $roles = [
            [
                'name' => '销量下降',
                'content' => [['name' => '列表1', 'content' => 'addrole'],['name' => '列表2', 'content' => 'update']],
            ],
            [
                'name' => 'aaa',
                'content' => [['name' => '列表3', 'content' => 'addrole2'],['name' => '列表4', 'content' => 'update2']],
            ],
        ];
        return view('roles.index',compact('users','roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function test2()
    {
        return view('demo2');
    }

}
