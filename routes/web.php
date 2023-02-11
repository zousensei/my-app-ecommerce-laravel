<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartColreoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',                       [HomeController::class,'homeIndex']);   

Route::get('/detail_product/{id}',    [ProductsController::class,'detail_product']);   

Route::get('/categorys',              [CategoryController::class,'categorys']);     
         
Route::post('/carts',                 [ShoppingCartColreoller::class,'addCart']);             
Route::get('/delCart/{id}',           [ShoppingCartColreoller::class,'delCart']);             
Route::get('/checkListProduct',       [ShoppingCartColreoller::class,'checkListProduct']);             
Route::get('/shoppingCart',           [ShoppingCartColreoller::class,'shoppingCart']);             
Route::get('/shoppingCheckout',       [ShoppingCartColreoller::class,'shoppingCheckout']);    
Route::get('/shoppingOrderDetail',    [ShoppingCartColreoller::class,'shoppingOrderDetail']);    

Route::get('/home_account',           [AccountController::class,'home_account']);    
Route::post('/updateProfile',         [AccountController::class,'updateProfile']);    
Route::post('/addAddress',            [AccountController::class,'addAddress']);    
Route::get('/changeAddress/{id}',     [AccountController::class,'changeAddress']);    
Route::get('/delAddress/{id}',        [AccountController::class,'delAddress']);    

Route::get('/login',                  [LoginController::class,'login']);              
Route::post('/checklogin',            [LoginController::class,'checklogin']);              
Route::get('/forgotPassword',         [LoginController::class,'forgotPassword']);              
Route::get('/forgotPasswordOTP',      [LoginController::class,'forgotPasswordOTP']);   
Route::get('/logout',                 [LoginController::class,'logout']);   

Route::get('/register',               [RegisterController::class,'register']);                          
Route::post('/createAccount',         [RegisterController::class,'createAccount']);              
Route::post('/checkOtpRegister',      [RegisterController::class,'checkOtpRegister']);              
Route::get('/delOtp/{id}',            [RegisterController::class,'delOtp']);              
