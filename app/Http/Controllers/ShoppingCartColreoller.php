<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\User;
use App\Models\Products;
use App\Models\Address;
use Session;
use DB;

class ShoppingCartColreoller extends Controller
{
    public function shoppingCart(){ 

        $customer_id = Session::get('cid') ;
        $myCart      = Carts::where('customer_id', $customer_id)->get();
        $my          = User::where('customer_id', $customer_id )->first();
        
        return view('pages.shoppingCart.shoppingCart')->with([ 'myCart' => $myCart,'my' => $my ]);
    }

    //-------------------------------------------------------------------------------------//

    public function shoppingCheckout(){ 

        $customer_id = Session::get('cid') ;
        $customer    = User::find($customer_id);
        $addressOn   = Address::where('address_status','=','on')->where('customer_id', $customer_id)->first();
        $addressOff  = Address::where('address_status','=','off')->where('customer_id', $customer_id)->get();

        return view('pages.shoppingCart.shoppingCheckout')->with([ 'customer' => $customer, 'addressOn' => $addressOn, 'addressOff' => $addressOff ]);
    }

    //-------------------------------------------------------------------------------------//

    public function shoppingOrderDetail(){ 

        return view('pages.shoppingCart.orderDetail');
    }

    //-------------------------------------------------------------------------------------//

    public function addCart(Request $request)
    {
        $customer_id = Session::get('cid') ;
        $product_id  = $request->product_id; 
        $amount      = $request->amount; 
        $checKCart   = Carts::where('customer_id', $customer_id)->where('product_id', $product_id)->first();
 
        if($checKCart != null){
            Carts::where('product_id', $product_id)->increment('amount', $amount);
        }else{

            $cart                 = new Carts();
            $cart->product_id     = $product_id ;
            $cart->customer_id    = $customer_id ;
            $cart->amount         = $amount;
            $cart->save();
        }

        if($request->back == 2){

            return back()->with('success','เพิ่มในตระกร้าเรียบร้อยแล้ว');

        }else{
            
            return redirect('/shoppingCart'); //ไปหน้าตะกร้าสินค้า
        }
    }

    //-------------------------------------------------------------------------------------//

    public function delCart($id)
    {
        DB::beginTransaction();
        try {

            $delCarts = Carts::destroy($id);

            DB::commit();
            return back()->with('success', 'ลบสินค้าออกจากตะกร้าแล้ว');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return back()->withError('ลบข้อมูลไม่สำเร็จ');
        }
    }

    //-------------------------------------------------------------------------------------//


}
