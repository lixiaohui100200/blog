<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    //本周未记录学员信息
    public function index()
    {

        /*if ($date1<=$date3 && $date3<=$date2){
            echo 1;
        }else{
            echo 2;
        }*/
        $data = DB::table('stu_class')
            ->where('show',1)
            ->select('class_id','class_name')
            ->get();
        return view('student.record.index',compact('data'));
    }
    //没有就业学员本周没有统计
    public function no_job($job_type,$xuan,$class_id)
    {
        $time1 =  date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y")));
        $time3 =  date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y")));
        if ($xuan ==0){
            $id = DB::table('student')
                ->where('student.class_id',$class_id)
                ->where('student.job_type',$job_type)
                ->LeftJoin('stu_record','student.id','=','stu_record.stu_id')
                ->whereBetween('stu_record.record_time',[$time1,$time3])
                ->select('student.id')
                ->get()->toArray();
            $ids = [];
            foreach ($id as &$v){
                $ids[] = $v->id;
            }
            $data = DB::table('student')
                ->where('student.class_id',$class_id)
                ->where('student.job_type',$job_type)
                ->LeftJoin('stu_record','student.id','=','stu_record.stu_id')
                ->whereNotIn('student.id',$ids)
                ->select('student.id','student.name','student.qq','student.tel','student.job_type')
                ->get();
        }elseif ($xuan ==1){
            $data = DB::table('student')
                ->where('student.class_id',$class_id)
                ->where('student.job_type',$job_type)
                ->LeftJoin('stu_record','student.id','=','stu_record.stu_id')
                ->whereBetween('stu_record.record_time',[$time1,$time3])
                ->select('student.id','student.name','student.qq','student.tel','student.job_type')
                ->get();
        }

        return view('student.record.job_n',compact('data'));
    }
}
