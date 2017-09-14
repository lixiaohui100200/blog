<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use FileUpload;
use Image;

class CateController extends Controller
{
    public function add()
    {
        if ($input = Input::except('_token')){

            $up = new FileUpload();
            //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
            $path = "./uploads/cate/";
            $up->set("path",$path);
            $up->set("maxsize",2000000); //kb
            $up->set("allowtype",array("gif","png","jpg","jpeg"));//可以是"doc"、"docx"、"xls"、"xlsx"、"csv"和"txt"等文件，注意设置其文件大小
            $up->set("israndname",1);//true:由系统命名；false：保留原文件名
            $up->upload("cate_image");
            $name = $up->getFileName();
            if (!empty($name)){
                $image = new Image($path);
                $image->thumb($name,350,220,"cate_");
                unlink($path.$name);
                $input['cate_image']= '/uploads/cate/'.'cate_'.$name;
            }


            $rules =[
                'cate_name' => 'required',
                'cate_order'=>'integer'
            ];
            $message = [
                'cate_name.required' => '分类名称不允许为空',
                'cate_order.integer' => '排序必须填写整数',
            ];

            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $re = DB::table('cate')->insert($input);
                if ($re){
                    echo "<script>alert('分类添加成功');location.href='".url('admin/list')."'</script>";
                }else{
                    echo "<script>alert('分类添加失败');location.href='".url('admin/list')."'</script>";
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            $data = DB::table('cate')->where('cate_pid','0')->select('cate_name','cate_id')->get();
            return view('admin.cate.add')->with('data',$data);
        }

    }

    public function lst()
    {
        $data = DB::table('cate')->orderBy('cate_order','asc')->get();
        $data = $this->getTree($data);
        return view('admin.cate.list')->with('data',$data);
    }

    public function getTree($data)
    {
        $arr = array();
        foreach ($data as $k => $v){
            if($v->cate_pid==0){
                $data[$k]->_cate_name = $data[$k]->cate_name;
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if ($n->cate_pid == $v->cate_id){
                        $data[$m]->_cate_name = '├─'.$data[$m]->cate_name;
                        $arr[]=$data[$m];
                    }
                }
            }
        }
        return $arr;
    }
    //异步修改排序
    public function changeorder()
    {
        $input = Input::all();
        $cate_id = $input['cate_id'];
        $cate_order = $input['cate_order'];
        $re = DB::table('cate')->where('cate_id',$cate_id)->update(['cate_order' => $cate_order]);
        if ($re){
            $data = [
              'state' => '1',
                'msg' => '排序更新成功'
            ];
        }else{
            $data = [
                'state' => '0',
                'msg' => '排序更新失败，请稍后再试'
            ];
        }
        return $data;
    }
    //修改分类
    public function edit($cate_id)
    {
        if ($input = Input::except('_token')){
            $re = DB::table('cate')->where('cate_id',$cate_id)->update($input);
            if ($re){
                echo "<script>alert('修改分类成功');location.href='".url('admin/list')."'</script>";
            }else{
                echo "<script>alert('修改分类失败');location.href='".url('admin/list')."'</script>";
            }
        }else{
            $data = DB::table('cate')->where('cate_id',$cate_id)->get();
            $data1 = DB::table('cate')->where('cate_pid',0)->get();
            return view('admin.cate.edit')->with('data',$data)->with('data1',$data1);
        }

    }

    public function del($cate_id)
    {
        $re = DB::table('cate')->where('cate_id',$cate_id)->delete();
        DB::table('cate')->where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        if ($re){
            $data = [
                'state' => '1',
                'msg' =>'删除分类成功'
            ];
        }else{
            $data = [
                'state' => '0',
                'msg' =>'删除分类失败'
            ];
        }
        return $data;
    }
}
