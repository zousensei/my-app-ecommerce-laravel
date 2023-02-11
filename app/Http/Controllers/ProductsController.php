<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function detail_product($id){ //รายละเอียดสินค้า

        $products_detail  = Products::where('product_id', $id)->first();   

        return view('pages.products.productDetail')->with([ 'products_detail' => $products_detail ]);
    }
}
