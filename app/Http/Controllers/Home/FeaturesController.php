<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    public function index($cate_id)
    {
        $art_new = DB::table('article')->orderBy('art_id','desc')->limit(5)->get();
        $data = DB::table('cate')->where('cate_pid',$cate_id)->get();
        $cate = DB::table('cate')->where('cate_pid',0)->select('cate_name','cate_id')->get();
        $name = DB::table('cate')->where('cate_id',$cate_id)->select('cate_name','cate_title')->get();
        $cate_ = DB::table('cate')->where('cate_pid','<>',0)->select('cate_name','cate_id')->get();
        return view('home.features',compact('cate','art_new','data','name','cate_'));
    }


}
