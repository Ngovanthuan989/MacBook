<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\HttpRequestHelper;
use App\Helpers\MailHelper;
use Illuminate\Support\Facades\Cookie;
use App\Models\Customers;


class HomeController extends Controller
{
    //
    public function index()
    {
       return view('dashboard.home.index');
    }

    public function login()
    {
        return view('dashboard.home.login');
    }

    public function postLogin(Request $request)
    {
        if (!$request->get('email')) {
            return response('Email không được để trống!',400);
        }
        if (!$request->get('password')) {
            return response('Password không được để trống!',400);
        }
        $login = DB::table('customer')->where([
            'email'=> $request->get('email'),
            'password'=> md5($request->get('password'))
        ])->get();

        if ($login[0]->id) {
            Cookie::queue('logged_user', json_encode($login[0]->id), 100);
            // $subject ="Mã xác thực được gửi từ MacTree";
            // $email_to = $request->get('email');
            // $content = '<p><b>Mã xác thực</b>: 234567</p>
            // ';

            // $send_mail = MailHelper::sendEmail($subject,$email_to,$content);
            return response('Thành công');
        }
        return response('Tài khoản hoặc mật khẩu sai!',400);


    }
}
