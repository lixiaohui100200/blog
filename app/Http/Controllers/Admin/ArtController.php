<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ArtController extends Controller
{
    public function add()
    {
        if ($input = Input::except('_token')){

        }else{
            $data = DB::table('cate')->where('cate_pid','!=',0)->select('cate_id','cate_name')->get();
            return view('admin.article.add')->with('data',$data);
        }

    }
}
