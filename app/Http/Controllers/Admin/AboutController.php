<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Excel;

class AboutController extends Controller
{
    //关于自己
    public function index()
    {
        $data = DB::table('about')->where('ab_id',1)->get();
        return view('admin.about.about', ['data' => $data]);
    }
    //修改关于自己
    public function edit()
    {
        if ($input = Input::except('_token')){
            //dd($input);
            $up = new \FileUpload();
            //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
            $path = "./uploads/about/";
            $up->set("path",$path);
            $up->set("maxsize",2000000); //kb
            $up->set("allowtype",array("gif","png","jpg","jpeg"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
            $up->set("israndname",2);//1:由系统命名；0：保留原文件名 2是自定义固定名字
            $up->set("guding","t4.jpg");
            //删除不用的数组
            unset($input['ab_image']);
           if ($up->upload("ab_image")){
                $input['ab_image'] = '/uploads/about/'.$up->getFileName();
            }
            //dd($input);
            $rule = [
                'ab_title'=> 'required',
                'ab_content'=>'required'
            ];
            $message = [
                'ab_title.required' => '标题填写不可为空',
                'ab_content.required' => '内容不允许为空'
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                 DB::table('about')->where('ab_id',1)->update($input);
                $data = [
                    'state' => 1,
                    'msg'=>'修改成功'
                ];
            }else{
                $data = $validator->errors()->all();
                $str = '';
                foreach ($data as $v){
                    $str.= $v."   ";
                }
                $data = [
                    'state'=>2,
                    'msg' => $str
                ];
            }
            return $data;


        }
        $data = DB::table('about')->where('ab_id',1)->get();
        return view('admin.about.edit',['data'=>$data]);
    }
    //Excel文件导出功能 By Laravel学院
    public function export(){
        $excel_file_path = '333.xls';;
        $data = Excel::load($excel_file_path)->get()->toArray();
        $key_name = array('key1','key2','key3','key4','key5','key6','key7','key8','key9','key10','key11','key12','key13','key14','key15');
        $arr = [];
        foreach ($data as $k=>$v){
            $arr_new = array_combine($key_name,$v);
            $arr[] = $arr_new;
        }

        dd($arr);

    }


}
