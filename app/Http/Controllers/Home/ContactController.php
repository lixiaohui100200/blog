<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

#联系我们
class ContactController extends Controller
{
    public function index()
    {
        if ($input = Input::except('_token')){
            dd($input);
        }
        $art_new = DB::table('article')->orderBy('art_id','desc')->limit(5)->get();
        $cate = DB::table('cate')->where('cate_pid',0)->select('cate_name','cate_id')->get();
        $cate_ = DB::table('cate')->where('cate_pid','<>',0)->select('cate_name','cate_id')->get();
        return view('home.contact',compact('cate','art_new','cate_'));
    }
}
