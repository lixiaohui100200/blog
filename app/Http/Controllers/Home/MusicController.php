<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class MusicController extends Controller
{
    public function index($cate_id)
    {
        $cate = DB::table('cate')->where('cate_pid',0)->select('cate_name','cate_id')->get();
        $data = DB::table('article')->where('cate_id',$cate_id)->get();
        return view('home.music',['cate'=>$cate],['data'=>$data]);
    }
}
