<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function home_account(){ 

        return view('pages.account.homeAccount');
    }
}
