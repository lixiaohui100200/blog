<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';

class LoginController extends Controller
{
    public function login()
    {
        if ($input = Input::all()) {
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                $data1 = [
                    'state' =>'300',
                    'msg' => '验证码错误'
                ];
                return $data1;
            }

            $data = DB::select('select user_name,user_pwd,login_time,user_ip from blog_admin ');
            if ($input['user_name'] == $data[0]->user_name && $input['user_pwd'] == Crypt::decrypt($data[0]->user_pwd)) {
                session(['user' => $data[0]]);
                $data1 = [
                    'state' =>200,
                    'msg' => '正在登陆请稍后。。'
                ];
            } else {
                $data1 = [
                    'state' =>301,
                    'msg' => '用户名或密码错误'
                ];
            }
            return $data1;

        } else {
            return view('admin.login');
        }

    }

    public function code()
    {
        $code = new \Code();
        $code->make();
    }
}
