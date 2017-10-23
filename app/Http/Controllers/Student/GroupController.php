<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    //分组主页
    public function index()
    {
        $data = DB::table('stu_class')
            ->where('show',1)
            ->select('class_id','class_name')
            ->get();
        return view('student.group.index',compact('data'));
    }

    public function group($class_id)
    {
        return view('student.group.group');
    }
}
