<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
            $up = new \FileUpload();
            //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
            $path = "./uploads/about/";
            $up->set("path",$path);
            $up->set("maxsize",2000000); //kb
            $up->set("allowtype",array("gif","png","jpg","jpeg"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
            $up->set("israndname",2);//1:由系统命名；0：保留原文件名 2是自定义固定名字
            $up->set("guding","t4.jpg");
            $up->upload("ab_image");
            //删除不用的数组
            unset($input['ab_image']);
            $input['ab_image'] = '/uploads/about/'.$up->getFileName();
            $info = DB::table('about')->where('ab_id',1)->update($input);
            if ($info){
                echo "<script>alert('修改成功');location.href="."url('admin/about')"."</script>";
            }else{
                echo "<script>alert('修改失败');location.href="."url('admin/about')"."</script>";
            }

        }
        $data = DB::table('about')->where('ab_id',1)->get();
        return view('admin.about.edit',['data'=>$data]);
    }


}
