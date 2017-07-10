<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArtController extends Controller
{
    public function add()
    {
        if ($input = Input::except('_token')){
            $input['art_time'] = date('Y-m-d H:i:s');
            $rules = [
                'art_pid' => 'integer',
                'art_title' => 'required',
                'art_view' => 'integer',
            ];
            $messages = [
                'art_title.required' => '标题填写不可以为空',
                'art_view.integer' => '点击量填写必须为整数',
                'art_pid.integer' => '文章分类不允许为空'
            ];
            $validator =  Validator::make($input,$rules,$messages);
            if ($validator->passes()){
                $re =  DB::table('article')->insert($input);
                if ($re){
                    echo "<script>alert('文章添加成功');location.href='".url('admin/artList')."'</script>";
                }else{
                    echo "<script>alert('文章添加失败');location.href='".url('admin/artAdd')."'</script>";
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            $data = DB::table('cate')->where('cate_pid','!=',0)->select('cate_id','cate_name')->get();
            return view('admin.article.add')->with('data',$data);
        }

    }
    //文章列表页
    public function lst()
    {
        $data = DB::table('article')->paginate(2);
        return view('admin.article.list')->with('data',$data);
    }
}
