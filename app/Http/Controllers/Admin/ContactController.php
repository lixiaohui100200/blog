<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $data = DB::table('contact')->orderBy('con_time','desc')->paginate(5);
        return view('admin.contact.list',['data'=>$data]);
    }
}
