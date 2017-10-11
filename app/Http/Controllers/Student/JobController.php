<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
            ->select('id','name','tel','qq','job_type')
            ->get();
        return view('student.job.job_n',compact('data'));
    }

    public function record($stu_id)
    {
        //获得个人信息
        $data = DB::table('student')
            ->where('id',$stu_id)
            ->select('id','name','qq','tel','type','edu','major')
            ->get();
        //获得跟踪信息
        $record = DB::table('stu_record')
            ->where('stu_id',$stu_id)
            ->get();
        return view('student.job.record',compact('data','record'));
    }
    //添加追踪内容
    public function add_record()
    {
        if ($input = Input::except('_token')){
            if ($input['record'] ==''){
                return $data = [
                    'state' => 100,
                    'msg' => '追踪内容不能为空'
                ];
            }
            $input['record_user'] = '李晓辉';
            $input['record_time'] = date('Y-m-d');
            $res = DB::table('stu_record')
                ->insert($input);
            if ($res){
                return $data = [
                    'state' => 200,
                    'msg' => '追踪内容添加成功'
                ];
            }
        }
    }
}
