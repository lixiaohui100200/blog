<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //学生主页
    public function index()
    {
        return view('student.index.index');
    }
}
