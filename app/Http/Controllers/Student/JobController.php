<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class JobController extends Controller
{
    //就业模块
    public function index()
    {
        $data = DB::table('stu_class')
            ->select('class_id','class_name')
            ->get();
        return view('student.job.index',compact('data'));
    }
    //展示未就业、本周入职、已就业信息
    public function job_n($job_type,$class_id)
    {
        if($job_type == 0){
            $data = DB::table('student')
                ->where('job_type',$job_type)
                ->where('class_id',$class_id)
                ->select('id','name','tel','qq','job_type')
                ->get();
            return view('student.job.job_n',compact('data'));
        }elseif($job_type ==1){
            $data = DB::table('student')
                ->where('job_type',$job_type)
                ->where('class_id',$class_id)
                ->LeftJoin('stu_entry','student.id','=','stu_entry.stu_id')
                ->select('student.id','student.name','student.job_type','stu_entry.*')
                ->get();
            return view('student.job.job_z',compact('data'));
        }elseif ($job_type == 2){
            $data = DB::table('student')
                ->where('job_type',$job_type)
                ->where('class_id',$class_id)
                ->LeftJoin('stu_entry','student.id','=','stu_entry.stu_id')
                ->select('student.id','student.name','student.job_type','stu_entry.*')
                ->get();
            return view('student.job.job_y',compact('data'));
        }

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
    //修改未就业为本周入职
    public function revamp_z()
    {
        if ($input = Input::except('_token')){
            $res = DB::table('student')
                ->where('id',$input['id'])
                ->update(['job_type'=>1]);
            if ($res){
                return $data = [
                    'state' => 200,
                    'msg' => '已经修改为本周入职'
                ];
            }
        }
    }
    //修改未就业为已就业
    public function revamp_y()
    {
        if ($input = Input::except('_token')){
            $res = DB::table('student')
                ->where('id',$input['id'])
                ->update(['job_type'=>2]);
            if ($res){
                return $data = [
                    'state' => 200,
                    'msg' => '已经修改为本周入职'
                ];
            }
        }
    }
    //记录页（本周入职）
    public function record_z($stu_id)
    {

        if ($input = Input::except('_token')){
            $input['record_user'] = '李晓辉';//放session
            $input['add_time'] = date('Y-m-d');
            $input['stu_id'] = $stu_id;
            $res = DB::table('stu_entry')
                ->where('stu_id',$stu_id)
                ->first();
            if ($res==''){
                DB::table('stu_entry')
                    ->insert($input);
                return $data = [
                    'state'=> 200,
                    'msg' => '就业信息添加成功'
                ];
            }else{
                DB::table('stu_entry')
                    ->where('stu_id',$stu_id)
                    ->update($input);
                return $data = [
                    'state'=> 201,
                    'msg' => '就业信息更新成功'
                ];
            }
        }
        $en  = DB::table('stu_entry')
            ->where('stu_id',$stu_id)
            ->first();

        $data = DB::table('student')
            ->where('id',$stu_id)
            ->select('student.id','student.name')
            ->get();
        return view('student.job.record_z',compact('data','en'));
    }
}
