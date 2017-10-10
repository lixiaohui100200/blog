<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Excel;
class StudentController extends Controller
{
    //导入学生信息 到数据库
    public function add()
    {
        if ($input = Input::except('_token')){
            //dd($input);
            if ($input['class_id']=='哒哒哒'){
                $data1 = [
                    'state' => 101,
                    'msg' => '分类不能为空'
                ];
                return $data1;
            }
            $up = new \FileUpload();
            //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
            $path = "./uploads/banner/";
            $up->set("path",$path);
            $up->set("maxsize",2000000); //kb
            $up->set("allowtype",array("xls"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
            $up->set("israndname",2);//1:由系统命名；0：保留原文件名 2是自定义固定名字
            $up->set("guding","123.xls");
            if($up->upload("student")===false){
                $data1 = [
                    'state' => 100,
                    'msg' => '上传文件不能为空'
                ];
                return $data1;
            }

            $excel_file_path = '/uploads/banner/123.xls';
            $data = Excel::load($excel_file_path)->get()->toArray();
            $key_name = array('id','name','sex','age','idcard','cardAddress','address',
                'qq','tel','type','edu','school','major','consult','graduateTime');
            $arr = [];
            foreach ($data as $k=>$v){
                $arr_new = array_combine($key_name,$v);
                $arr_new['class_id'] = $input['class_id'];
                $arr[] = $arr_new;
            }
            DB::table('stu_class')->where('class_id',$input['class_id'])->update(['show'=>1]);
            if (DB::table('student')->insert($arr)){
                $data1 = [
                    'state' => 200,
                    'msg' => '文件导入成功'
                ];
                return $data1;
            }

        }
        $data = DB::table('stu_class')->select('class_id','class_name')->where('show',0)->get();
        return view('student.student.add',compact('data'));
    }
}
