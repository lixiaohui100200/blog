<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    //就业模块
    public function index($class_id)
    {
        return view('student.job.index',compact('class_id'));
    }
    //未就业
    public function job_n($job_type,$class_id)
    {
        $data = DB::table('student')
            ->where('job_type',$job_type)
            ->where('class_id',$class_id)
            ->select('name','tel','qq','job_type')
            ->get();
        return view('student.job.job_n',compact('data'));
    }
}
