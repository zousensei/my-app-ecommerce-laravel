<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){ 

        return view('pages.auth.login');
    }

    public function forgotPassword(){ 

        return view('pages.auth.forgotPassword');
    }

    public function forgotPasswordOTP(){ 

        return view('pages.auth.forgotPasswordOTP');
    }
}
