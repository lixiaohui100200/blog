<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

#数据库备份与恢复
class DatabaseController extends Controller
{
    #数据库首页
    public function index()
    {
        return view('admin.database.database');
    }

    public function down()
    {
        //备份数据库
        $db = new \DbManage('localhost','root','root','blog','utf8');
        $db->backup('','','');
        //获取指定文件夹下的一个文件名字
        $dir="./backup/";
        $file_name=scandir($dir);
        $file_name = $file_name[2];
        //移动到根目录并删除原来文件
        $file= './backup/'.$file_name; //旧目录
        $newFile='./'.$file_name; //新目录
        @copy($file,$newFile); //拷贝到新目录
        @unlink($file); //删除旧目录下的文件
        //下载到本地
        $fileName = $file_name; //得到文件名
        //header前不能有任何输出
        header( "Content-Disposition:  attachment;  filename=".$fileName); //告诉浏览器通过附件形式来处理文件
        header('Content-Length: ' . filesize($fileName)); //下载文件大小
        readfile($fileName);  //读取文件内容
        @unlink($newFile); //删除旧目录下的文件
    }

    public function _import()
    {
        //导入数据库
        if ($input = Input::except('_token')){

                $up = new \FileUpload();
                //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
                $path = "./uploads/sql/";
                $up->set("path",$path);
                $up->set("maxsize",2000000); //kb
                $up->set("allowtype",array("sql"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
                $up->set("israndname",0);//1:由系统命名；0：保留原文件名 2是自定义固定名字
                $up->upload("sql");
                $name = $up->getFileName();
                $filename = $path.$name;
                $db = new \DbManage('localhost','root','root','blog','utf8');
                $db->restore($filename);
                @unlink($filename); //删除旧目录下的文件
                $data = [
                    'state' => 200,
                    'msg' => '备份数据恢复成功',
                ];

        }else{
            $data = [
                'state' => 0,
                'msg' => '您上传的文件为空,请选择文件上传',
            ];
        }
        return $data;
    }
}
