<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CateController extends Controller
{
    public function add()
    {
        if ($input = Input::except('_token')){
            $rules =[
                'cate_name' => 'required',
            ];
            $message = [
                'cate_name.required' => '分类名称不允许为空'
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
                'msg' => '排序更新成功，请手动刷新界面'
            ];
        }else{
            $data = [
                'state' => '0',
                'msg' => '排序更新失败，请稍后再试'
            ];
        }
        return $data;
    }
}
