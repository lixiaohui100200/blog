<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    //列表页
    public function index()
    {
        $data = DB::table('contact')->orderBy('con_time', 'desc')
            ->select('con_id', 'con_name', 'con_tel', 'con_email', 'con_ip', 'con_time', 'con_read')
            ->paginate(5);
        return view('admin.contact.list', ['data' => $data]);
    }

    //内容详情页
    public function content()
    {
        if ($input = Input::except('_token')) {
            DB::table('contact')->where('con_id', $input['id'])->update(['con_read' => 1]);
            $data = DB::table('contact')->where('con_id', $input['id'])->select('con_content')->get();
            $data1 = [
                'state' => 200,
                'msg' => $data[0]->con_content,
            ];
            return $data1;
        }

    }
}
