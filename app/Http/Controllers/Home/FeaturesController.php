<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    public function index($cate_id)
    {
        $data = DB::table('cate')->where('cate_pid',$cate_id)->get();
        $cate = DB::table('cate')->where('cate_pid',0)->select('cate_name','cate_id')->get();
        return view('home.features',['cate'=>$cate],['data'=>$data]);
    }


}
