<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class SingleController extends Controller
{
    public function index($art_id)
    {
        //文章热门排行
        $art_new = DB::table('article')->orderBy('art_id','desc')->limit(5)->get();
        $data = DB::table('article')->where('art_id',$art_id)->get();
        $cate = DB::table('cate')->where('cate_pid',0)->select('cate_name','cate_id')->get();
        $cate_ = DB::table('cate')->where('cate_pid','<>',0)->select('cate_name','cate_id')->get();
        return view('home.singlepage',compact('cate','art_new','data','cate_'));
    }
}
