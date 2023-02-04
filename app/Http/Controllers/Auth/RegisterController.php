<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){ 

        return view('pages.auth.register');
    }
    public function registerOTP(){ 

        return view('pages.auth.registerOTP');
    }
}
