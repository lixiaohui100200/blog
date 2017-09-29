<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    //评论列表页
    public function index()
    {
        $data = DB::table('comment')
            ->join('user',function ($join){
                $join->on('comment.user_id','=','user.user_id');
            })
            ->join('article',function ($j){
                $j->on('comment.art_id','=','article.art_id');
            })
            ->select('comment.id', 'comment.comment_date', 'comment.com_ip',
                'comment.com_show', 'user.user_nickname','article.art_title')
            ->orderBy('comment_date','desc')
            ->paginate(10);
        return view('admin.comment.list',compact('data'));
    }
    //评论内容
    public function comment()
    {
        if ($input = Input::except('_token')){
            $data = DB::table('comment')
                ->where('id','=',$input['id'])
                ->select('comment')
                ->get();
            return $data1 = [
                'state'=> 200,
                'msg' => $data[0]->comment,
            ];
        }
    }
    //点击切换状态
    public function show_()
    {
        if ($input = Input::except('_token')){
            if ($input['state'] == 1){
                DB::table('comment')->where('id',$input['id'])->update(['com_show'=>0]);
                return $data =[
                    'state' => 001,
                    'msg' => '修改为不通过'
                ];
            }else{
                DB::table('comment')->where('id',$input['id'])->update(['com_show'=>1]);
                return $data =[
                    'state' => 002,
                    'msg' => '修改为通过'
                ];
            }

        }
    }
    //评论关键字过滤
    public function keys()
    {
        if ($input = Input::except('_token')){
            //输入字段不能为空'
            if ($input['keywords'] == ''){
                return $data = [
                    'state' =>001,
                    'msg' => '关键字关键词添加不能为空',
                ];
            }
            //将关键字保存在原有内容后面
            DB::update("update blog_keywords set keywords=CONCAT(keywords,'".".".$input['keywords']."')");
            return $data = [
                'state' =>200,
                'msg' => '关键字添加成功',
            ];

        }
        //展示所有的关键字
        $res = DB::table('keywords')->select('keywords')->get();
        $res = substr($res[0]->keywords,1);
        $arr = explode('.',$res);
        return view('admin.comment.keywords',compact('arr'));
    }
    //删除数据库中的关键字
    public function rem()
    {
        if ($input = Input::except('_token')){
            if ($input['keys'] == ''){
                return $data = [
                    'state' => 001,
                    'msg' => '发送内容不能为空'
                ];
            }else{
                DB::update("update blog_keywords set keywords=REPLACE(keywords,'".".".$input['keys']."','')");
                return $data = [
                    'state' => 200,
                    'msg' => '关键字删除成功'
                ];
            }
        }
    }
}
