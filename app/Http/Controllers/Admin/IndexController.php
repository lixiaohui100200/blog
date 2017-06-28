<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function add()
    {
        return view('admin.add');
    }

    public function lst()
    {
        return view('admin.list');
    }
}
