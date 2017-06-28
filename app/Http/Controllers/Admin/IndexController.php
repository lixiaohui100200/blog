<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function add()
    {
        return view('admin.add');
    }

    public function lst()
    {
        return view('admin.list');
    }

    public function out()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function pass()
    {
        if ($input = Input::all()){
            $rules = [
                'password'=>'required',
            ];
            $message = [
                'password.required' => '新密码不能为空',
            ];
            $validator = Validator::make($input,$rules,$message);
            if ($validator->passes()){
                echo 'yes';
            }else{
                dd($validator->errors()->all());
            }
        }else{
            return view('admin.pass');
        }

    }
}
