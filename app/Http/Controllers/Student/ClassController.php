<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClassController extends Controller
{
    //添加分类
    public function add()
    {
        if ($input = Input::except('_token')){
            if ($input['class_name']==''){
                $data = [
                    'state' => 100,
                    'msg' => '分类名称不能为空'
                ];
                return $data;
            }
            $input['add_user'] = '李晓辉';
            $input['add_time'] = date('Y-m-d H:i:s');
            if(DB::table('stu_class')->insert($input)){
                $data = [
                    'state' => 200,
                    'msg' => '分类添加成功'
                ];
                return $data;
            }
        }
        return view('student.class.add');
    }
    //班级分类展示
    public function lst()
    {
        $data = DB::table('stu_class')->orderBy('add_time','desc')->get();
        return view('student.class.list',compact('data'));
    }
}
