<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login(){ 

        return view('pages.auth.login');
    }

    //-------------------------------------------------------------------------------------//

    public function checklogin(Request $request)
    {

        DB::beginTransaction();
        try {

            $credentialsUsername = [
                'customer_username' => $request->username,
                'customer_password' => $request->password
            ];

            $credentialsEmail = [
                'customer_email'    => $request->username,
                'customer_password' => $request->password
            ];

            $credentialsPhone = [
                'customer_phone'    => $request->username,
                'customer_password' => $request->password
            ];

             if ( Auth::guard('web')->attempt($credentialsUsername) || Auth::guard('web')->attempt($credentialsEmail) || Auth::guard('web')->attempt($credentialsPhone) ) {
            
            $usernames = $request->username ; 

            $data_user =   DB::table('tb_customers')
            ->where('customer_username', $usernames)
            ->orWhere('customer_email',  $usernames)
            ->orWhere('customer_phone',  $usernames)
            ->first();

            Session::put('cid', $data_user->customer_id);
            Session::put('c_name', $data_user->customer_name);
            Session::put('c_lname', $data_user->customer_lname);

            DB::commit();
            return redirect('/');
        }
        
        return redirect('/login')->with('error','[ หมายเลขโทรศัพท์ , Email , ชื่อผู้ใช้ ] หรือ รหัสผ่าน ไม่ถูกต้อง ! .');

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/login')->withError('ไม่สำเร็จ');
        }

   
    }

    //-------------------------------------------------------------------------------------//

    public function forgotPassword(){ 

        return view('pages.auth.forgotPassword');
    }

    //-------------------------------------------------------------------------------------//

    public function forgotPasswordOTP(){ 

        return view('pages.auth.forgotPasswordOTP');
    }

    //-------------------------------------------------------------------------------------//

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

    //-------------------------------------------------------------------------------------//
}
