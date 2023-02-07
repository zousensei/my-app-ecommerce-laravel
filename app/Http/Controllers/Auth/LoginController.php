<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use DB;

class LoginController extends Controller
{
    public function login(){ 

        return view('pages.auth.login');
    }

    //-------------------------------------------------------------------------------------//

    public function checklogin(Request $request)
    {
        $username = $request->username ;
        $password = $request->password ;
        
        dd(Auth::guard('web')->attempt(['customer_username' => $username, 'customer_password' => $password ]));

        if ( Auth::guard('web')->attempt(['customer_username' => $username , 'customer_password' => $password]) ||
             Auth::guard('web')->attempt(['customer_phone'  => $username , 'customer_password' => $password]) ) 
        {  
            $user = DB::table('tb_customers')->where('customer_username', $username)->orWhere('customer_phone', $username)->first();
            Session::put('cid',$user->customer_id);
            
            return redirect('/');
        } else {
            return redirect('/login')->with('error','Username Or Password Are Wrong.');
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
        return redirect('/login');
    }

    //-------------------------------------------------------------------------------------//
}
