<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        if ($input = Input::except('_token')){

        }
        $ids = DB::table('stu_group')
            ->where('class_id',$class_id)
            ->select('stu_ids')
            ->get()
            ->toArray();
        $id = '';
        foreach ($ids as $v){
            $id .= $v->stu_ids;
        }
        $id = substr($id,1);
        $id = explode(',',$id);
        $data = DB::table('student')
            ->where('class_id','=',$class_id)
            ->whereNotIn('id',$id)
            ->select('id','name')
            ->get();
        return view('student.group.group',compact('data'));
    }
}
