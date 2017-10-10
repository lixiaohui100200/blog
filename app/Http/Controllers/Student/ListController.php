<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //学生列表
    public function index()
    {
        return view('student.list.list');
    }

}
