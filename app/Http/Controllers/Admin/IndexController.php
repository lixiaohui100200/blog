<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index()
    {
        $data  = DB::table('contact')->where('con_read',0)->count('con_read');
        return view('admin.index',['data'=>$data]);
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
                $user_pwd = session('user')->user_pwd;
                $user_name = session('user')->user_name;
                if (Crypt::decrypt($user_pwd) == $input['password_0']){
                    $user_password = Crypt::encrypt($input['password']);
                    if(DB::update("update blog_admin set user_pwd='$user_password' where user_name='$user_name'")){
                        session(['user'=>null]);
                        $url = url('admin/login');
                        echo "<script>alert('密码修改成功');top.location.href='$url'</script>";

                    }
                }else{
                    return back()->with('msg','原密码输入错误');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.pass');
        }

    }
}
