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
                'cate_id' => 'integer',
                'art_title' => 'required',
                'art_view' => 'integer',
            ];
            $messages = [
                'cate_id.integer' => '文章分类不允许为空',
                'art_title.required' => '标题填写不可以为空',
                'art_view.integer' => '点击量填写必须为整数',

            ];
            $validator =  Validator::make($input,$rules,$messages);
            if ($validator->passes()){
                $re =  DB::table('article')->insert($input);
                if ($re){
                    $data = [
                        'state' => '200',
                        'msg' => '文章添加成功'
                    ];
                }else{
                    $data = [
                        'state' => '400',
                        'msg' => '文章添加失败'
                    ];
                }

            }else{
               return $data = [
                   'state' => '11',
                   'msg' => $validator->errors()->all(),
               ];
            }
            return $data;
        }else{
            $data = DB::table('cate')->where('cate_pid','!=',0)->select('cate_id','cate_name')->get();
            return view('admin.article.add')->with('data',$data);
        }

    }
    //文章列表页
    public function lst()
    {
        $data = DB::table('article')->orderBy('art_id','desc')->select('art_id','art_title','art_view','art_discription','art_image','art_editor','art_time','art_keywords')->paginate(5);
        //dd($data);

        return view('admin.article.list')->with('data',$data);
    }
    //文章修改
    public function edit($art_id)
    {
        if ($input = Input::except('_token')){
            $rule = [
                'art_pid' => 'integer',
                'art_title' => 'required',
                'art_view' => 'integer',
            ];
            $message = [
                'art_title.required' => '标题填写不可以为空',
                'art_view.integer' => '点击量填写必须为整数',
                'art_pid.integer' => '文章分类不允许为空'
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                $re =  DB::table('article')->where('art_id',$art_id)->update($input);
                if ($re){
                    $data = [
                        'state' => '200',
                        'msg' => '文章修改成功'
                    ];
                }else{
                    $data = [
                        'state' => '404',
                        'msg' => '文章修改失败'
                    ];                }
                return $data;
            }else{
                return back()->withErrors($validator);
            }
        }else{
            $dat  = DB::table('cate')->select('cate_id','cate_name')->get();
            $data = DB::table('article')->where('art_id',$art_id)->get();
            return view('admin.article.edit',['data'=>$data],['dat'=>$dat]);
        }

    }

    public function del($art_id)
    {
        $filename = DB::table('article')->where('art_id',$art_id)->select('art_image')->first();
        if ($filename->art_image){
            unlink($filename->art_image);
        }
        $re = DB::table('article')->where('art_id',$art_id)->delete();

        if ($re){
            $data = [
                'state' => '200',
                'msg' => '文章删除成功'
            ];
        }else{
            $data = [
                'state' => '404',
                'msg' => '文章删除失败'
            ];
        }
        return $data;
    }
}
