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
                'password_0' => 'required',
                'password'=>'required|between:6,20|confirmed',

            ];
            $message = [
                'password_0.required' => '原始密码不能为空',
                'password.required' => '新密码不能为空',
                'password.between' => '密码长度必须为6-20',
                'password.confirmed' => '新密码两次输入不一致',
            ];
            $validator = Validator::make($input,$rules,$message);
            if ($validator->passes()){
                echo 'yes';
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.pass');
        }

    }
}
