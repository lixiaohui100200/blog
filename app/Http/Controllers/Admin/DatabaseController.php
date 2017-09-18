<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
#数据库备份与恢复
class DatabaseController extends Controller
{
    #数据库首页
    public function index()
    {
        //备份数据库
        $db = new \DbManage('localhost','root','root','blog','utf8');
        $db->backup('','','');
        //获取指定文件夹下的一个文件名字
        $dir="./backup/";
        $file_name=scandir($dir);
        $file_name = $file_name[2];
        //移动到根目录并删除原来文件下的文件
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
        //return view('admin.database.database');
    }

    public function down()
    {


    }
}
