<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartColreoller extends Controller
{
    public function shoppingCart(){ 

        return view('pages.shoppingCart.shoppingCart');
    }

    public function shoppingCheckout(){ 

        return view('pages.shoppingCart.shoppingCheckout');
    }

    public function shoppingOrderDetail(){ 

        return view('pages.shoppingCart.orderDetail');
    }
}
