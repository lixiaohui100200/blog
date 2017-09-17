<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

#联系我们
class ContactController extends Controller
{
    public function index()
    {

        if ($input = Input::except('_token')) {

            $rules = [
                'con_name' => 'required|max:20',
                'con_email' => 'email',
                'con_tel' => 'max:15',
                'con_content' => 'required|max:200'
            ];

            $message = [
                'con_name.required' => '姓名不允许为空',
                'con_name.max' => '姓名不允超过20长度',
                'con_email.email' => '请输入正确的邮箱',
                'con_tel.max' => '电话输入不能超过15长度',
                'con_content.required' => '意见不能为空',
                'con_content.max' => '意见不能超过200长度',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->passes()) {
                $Ip = $_SERVER["REMOTE_ADDR"];
                $re = DB::table('contact')->where('con_ip', $Ip)->orderBy('con_time', 'desc')->select('con_time')->get();
                if ($re) {
                    $time = $re[0]->con_time;
                    $date = strtotime($time);
                    $timeNow = time();
                    if ($timeNow - $date > 1800) {
                        $input['con_time'] = date('Y-m-d H:i:s');
                        $input['con_ip'] = $Ip;
                        if (DB::table('contact')->insert($input)) {
                            $data = [
                                'state' => 200,
                                'msg' => '反馈成功,谢谢'
                            ];
                        }
                    } else {
                        $data = [
                            'state' => 300,
                            'msg' => '请过半个小时后再反馈,谢谢'
                        ];
                    }

                } else {
                    $input['con_time'] = date('Y-m-d H:i:s');
                    $input['con_ip'] = $Ip;
                    if (DB::table('contact')->insert($input)) {
                        $data = [
                            'state' => 200,
                            'msg' => '反馈成功,谢谢'
                        ];
                    }
                }


            } else {
                $data = $validator->errors()->all();
                $str = '';
                foreach ($data as $v) {
                    $str .= $v . "  ";
                }
                $data = [
                    'state' => 0,
                    'msg' => $str
                ];
            }
            return $data;
        }
        $art_new = DB::table('article')->orderBy('art_id', 'desc')->limit(5)->get();
        $cate = DB::table('cate')->where('cate_pid', 0)->select('cate_name', 'cate_id')->get();
        $cate_ = DB::table('cate')->where('cate_pid', '<>', 0)->select('cate_name', 'cate_id')->get();
        $db = new \DbManage('localhost','root','root','blog','utf8');
        $db->backup('','','');
        return view('home.contact', compact('cate', 'art_new', 'cate_'));
    }
}
