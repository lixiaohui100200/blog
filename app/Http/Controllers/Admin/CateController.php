<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CateController extends Controller
{
    public function add()
    {
        if ($input=Input::all()){
            dd($input);
           if (DB::table('cate')->insert($input)){
                echo 11;
            }else{
               echo 22;
           }
        }else{
            return view('admin.add');
        }

    }
}
