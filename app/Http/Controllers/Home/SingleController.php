<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SingleController extends Controller
{
    public function index($art_id)
    {
        //文章热门排行
        $art_new = DB::table('article')->orderBy('art_view', 'desc')->limit(5)->get();
        $data = DB::table('article')->where('art_id', $art_id)->get();
        //增加文章的点击量
        $view = $data[0]->art_view + 1;
        //评论内容展示
        $comment = DB::table('comment')->where('com_show',1)->where('art_id',$art_id)->select('comment','comment_date')->get();
        DB::table('article')->where('art_id', $art_id)->update(['art_view' => $view]);
        $cate = DB::table('cate')->where('cate_pid', 0)->select('cate_name', 'cate_id')->get();
        $cate_ = DB::table('cate')->where('cate_pid', '<>', 0)->select('cate_name', 'cate_id')->get();
        return view('home.singlepage', compact('cate', 'art_new', 'data', 'cate_','comment'));
    }
    //评论模块
    public function comment()
    {
        if ($input = Input::except('_token')){
            $input['user_id'] = 1;
            $input['comment_date'] = date('Y-m-d H:i:s');
            $input['com_ip'] = $_SERVER['REMOTE_ADDR'];
            if ($input['comment'] ==''){
                return $data = [
                    'state' => 0,
                    'msg' => '评论内容不允许为空'
                ];
                if(strlen($input['comment']) >= 100){
                    return $data = [
                        'state' => 02,
                        'msg' => '评论内容不得超过100字节'
                    ];
                }
            }else{
                if (DB::table('comment')->insert($input)){
                    $data = [
                        'state' => 200,
                        'msg' => '评论成功'
                    ];
                }else{
                    $data = [
                        'state' => 01,
                        'msg' => '添加失败'
                    ];
                }
                return $data;
            }
        }
    }
}
