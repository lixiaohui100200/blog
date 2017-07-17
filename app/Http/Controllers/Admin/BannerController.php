<?php

namespace App\Http\Controllers\Admin;

use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    public function banner()
    {
        if ($input = Input::all()){
            $up = new \FileUpload();
            //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
            $path = "./uploads/banner/";
            $up->set("path",$path);
            $up->set("maxsize",2000000); //kb
            $up->set("allowtype",array("gif","png","jpg","jpeg"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
            $up->set("israndname",2);//1:由系统命名；0：保留原文件名 2是自定义固定名字
            $up->set("guding","banner-1.jpg");
            if($up->upload("banner_image")){
                $data = [
                    'state' => '200',
                    'msg' => 'banner修改成功'
                ];
            }else{
                $data = [
                    'state' => '400',
                    'msg' => '图片上传失败'
                ];
            }
            return $data;
        }
        return view('admin.banner.add');

    }
    public function banner_()
    {
        if ($input = Input::all()){
            $up = new \FileUpload();
            //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
            $path = "./uploads/banner/";
            $up->set("path",$path);
            $up->set("maxsize",2000000); //kb
            $up->set("allowtype",array("gif","png","jpg","jpeg"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
            $up->set("israndname",2);//1:由系统命名；0：保留原文件名 2是自定义固定名字
            $up->set("guding","banner-2.jpg");
            if($up->upload("banner_image")){
                $data = [
                    'state' => '200',
                    'msg' => 'banner修改成功'
                ];
            }else{
                $data = [
                    'state' => '400',
                    'msg' => '图片上传失败'
                ];
            }
            return $data;
        }
        return view('admin.banner.addBanner');

    }

    public function list1()
    {
        return view('admin.banner.list');
    }
    public function list2()
    {
        return view('admin.banner.list_');
    }
}
