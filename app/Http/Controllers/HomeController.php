<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class HomeController extends Controller
{
    public function homeIndex(){ 

        $categorys = Category::all();    
        $products  = Products::orderBy('created_at', 'desc')->limit(12)->get();   
         
        return view('pages.home')->with([ 'category' => $categorys, 'product' => $products  ]);
    }

    //-------------------------------------------------------------------------------------//


}
