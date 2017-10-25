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
    //展示分组内容
    public function group($class_id)
    {
        //ajax修改学生分组
        $user_id = 2;
        if($input = Input::except('_token')){
            $id = ','.substr($input['id'],0,strrpos($input['id'],'-'));
            $re = DB::table('stu_group')
                ->where('user_id',$user_id)
                ->where('class_id',$class_id)
                ->select('id')
                ->first();
            if ($re){
                DB::update("update blog_stu_group set stu_ids=CONCAT(stu_ids,'$id') 
                            WHERE user_id=$user_id AND class_id=$class_id");
            }else{
                $data['user_id'] = $user_id;
                $data['stu_ids'] = $id;
                $data['class_id'] = $class_id;
                DB::table('stu_group')->insert($data);
            }
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
            ->select('id','name','class_id')
            ->get();
        if (!$data==''){
            $data[] =(object)["id"=>'abcd',"class_id"=>$class_id];
        }
        return view('student.group.group',compact('data'));
    }
    //删除分组中的学员
    public function group_del($class_id)
    {
        if ($input =Input::except('_token')){
            $user_id = 2;
            $id = ','.substr($input['id'],0,strrpos($input['id'],'-'));
            DB::update("update blog_stu_group set stu_ids=REPLACE(stu_ids,'$id','')
                        WHERE class_id=$class_id AND user_id=$user_id");
        }
    }
}
