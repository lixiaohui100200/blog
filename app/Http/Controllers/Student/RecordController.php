<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    //本周未记录学员信息
    public function index()
    {
         $date1 =  strtotime(date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))));
        $date2 = strtotime(date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"))));
        $date3 =strtotime('2017-10-23');
        if ($date1<=$date3 && $date3<=$date2){
            return 1;
        }else{
            return 2;
        }
        die;
        return view('student.record.index');
    }
}
