<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    public function upload()
    {
        $file = Input::file('Filedata');
        if ($file->isValid()){
            $entension = $file->getClientOriginalExtension();//获取文件名后缀
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $file->move(base_path().'/uploads/',$newName);
            return 'uploads/'.$newName;
        }
    }
}
