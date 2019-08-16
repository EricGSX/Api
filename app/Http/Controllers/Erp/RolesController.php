<?php

namespace App\Http\Controllers\Erp;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class RolesController extends BaseController
{
    public function index()
    {
        return view('roles.index');
    }

    public function create()
    {
        return view('roles.create');
    }
}
