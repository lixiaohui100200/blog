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
}
