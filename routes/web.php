<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartColreoller;

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

Route::get('/', function () { return view('pages.home'); });

Route::get('/detail_product',         [ProductsController::class,'detail_product']);              
Route::get('/shoppingCart',           [ShoppingCartColreoller::class,'shoppingCart']);             
Route::get('/shoppingCheckout',       [ShoppingCartColreoller::class,'shoppingCheckout']);              
