<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if ($input = Input::all()){
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code'])!= $_code){
                return back()->with('msg','验证码错误');
            }
            $data = DB::select('select user_name,user_pwd,login_time,user_ip from blog_admin ');
            if ($input['user_name'] == $data[0]->user_name && $input['user_pwd']== Crypt::decrypt($data[0]->user_pwd)){
                session(['user'=>$data[0]]);
                return redirect('admin/index');
            }else{
                return back()->with('msg','用户名或密码错误');
            }
        }else{
            return view('admin.login');
        }

    }

    public function code()
    {
        $code =  new \Code();
        $code->make();
    }
}
