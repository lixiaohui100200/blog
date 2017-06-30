<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CateController extends Controller
{
    public function add()
    {
        if ($input=Input::except('_token')){
            dd($input);
           if (DB::table('cate')->insert($input)){
                echo 11;
            }else{
               echo 22;
           }
        }else{
            return view('admin.add');
        }

    }

    public function lst()
    {
        $data = DB::table('cate')->get();
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
        echo 123123;
    }
}
