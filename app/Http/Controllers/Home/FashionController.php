<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class FashionController extends Controller
{
    public function index()
    {
        $cate = DB::table('cate')->where('cate_pid',0)->select('cate_name','cate_id')->get();
        return view('home.fashion',['cate'=>$cate]);
    }
}
