<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function detail_product(){ //รายละเอียดสินค้า

        return view('pages.products.productDetail');
    }
}
