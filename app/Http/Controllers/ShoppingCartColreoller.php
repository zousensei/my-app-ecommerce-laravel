<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\User;
use App\Models\Products;
use App\Models\Address;
use App\Models\Orders;
use Session;
use DB;

class ShoppingCartColreoller extends Controller
{
    public function shoppingCart()
    {
        $customer_id = Session::get('cid');
        $myCart      = Carts::where('customer_id', $customer_id)->get();
        $my          = User::where('customer_id', $customer_id )->first();
    
        $Orders      = Orders::where('customer_id', $customer_id)->groupBy('code_orders')->orderBy('created_at', 'desc')->get(['code_orders']);
    
        return view('pages.shoppingCart.shoppingCart')->with([ 'myCart' => $myCart,'my' => $my,'Order' => $Orders  ]);
    }
    

    //-------------------------------------------------------------------------------------//

    public function shoppingCheckout(){ 

        $customer_id    = Session::get('cid') ;
        $customer       = User::find($customer_id);
        $addressOn      = Address::where('address_status','=','on')->where('customer_id', $customer_id)->first();
        $addressOff     = Address::where('address_status','=','off')->where('customer_id', $customer_id)->get();

        $checkMyOrders  = Orders::where('customer_id', $customer_id)->orderBy('created_at', 'desc')->first();
        $myOrders       = Orders::where('code_orders', $checkMyOrders->code_orders )->get();

        return view('pages.shoppingCart.shoppingCheckout')
        ->with([ 'customer' => $customer, 'addressOn' => $addressOn, 'addressOff' => $addressOff, 'myOrder' => $myOrders, 'checkMyOrder' => $checkMyOrders   ]);
    }

    //-------------------------------------------------------------------------------------//

    public function shoppingOrderDetail(Request $request){ 

        DB::beginTransaction();
        try {

            // Get the form data
            $product_id                      = $request->input('product_id');
            $amount                          = $request->input('amount');
            $transport_price                 = $request->input('transport_price');
            $transport                       = $request->input('transport');
            $code_orders                     = $request->input('code_orders');
            $bank                            = $request->input('bank');

            $customer_id                     = Session::get('cid') ;
            $addressOn                       = Address::where('address_status','=','on')->where('customer_id', $customer_id)->first();

            if($addressOn === null){

                return back()->with('success','กรุณาตั้งค่าที่อยู๋เริ่มต้น แล้วลองใหม่อีกครั้ง !');
            }

            for ($i=0; $i < count($product_id); $i++) { 
                
                $ordersDetail                = new Orders;
                $orders->customer_id         = $customer_id ;
                $orders->transport           = $transport  ;
                $orders->transport_price     = $transport_price  ;
                $orders->code_orders         = $code_orders ;
                $orders->product_id          = $product_id[$i] ; 
                $orders->amount              = $amount[$i];
                $orders->save();
    
            }

            DB::commit();
            return redirect('/shoppingCheckout') ;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/shoppingCart')->withError('ไม่สามารถเพิ่มข้อมูล ออร์เดอร์ ได้ !');
        }

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

    public function addNewOrders(Request $request)
    {
        DB::beginTransaction();
        try {

            // Get the form data
            $product_id                      = $request->input('product_id');
            $amount                          = $request->input('amount');
            $transport_price                 = $request->input('transport_price');
            $transport                       = $request->input('transport');
            $code_orders                     = substr(md5(mt_rand()), 0, 8) ; //สุ่มรหัส

            $customer_id                     = Session::get('cid') ;

            for ($i=0; $i < count($product_id); $i++) { 
                
                $orders                      = new Orders;
                $orders->customer_id         = $customer_id ;
                $orders->transport           = $transport  ;
                $orders->transport_price     = $transport_price  ;
                $orders->code_orders         = $code_orders ;
                $orders->product_id          = $product_id[$i] ; 
                $orders->amount              = $amount[$i];
                $orders->save();
    
            }

            DB::commit();
            return redirect('/shoppingCheckout') ;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/shoppingCart')->withError('ไม่สามารถเพิ่มข้อมูล ออร์เดอร์ ได้ !');
        }
    }

    //-------------------------------------------------------------------------------------//

    public function delOrders($id)
    {
        DB::beginTransaction();
        try {

            Orders::where('code_orders', $id)->delete();

            DB::commit();
            return redirect('/shoppingCart')->with('success', 'ยกเลิกรายการ ออร์เดอร์ เรียบร้อยแล้ว !');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return back()->withError('ยกเลิกข้อมูลไม่สำเร็จ');
        }
    }

    //-------------------------------------------------------------------------------------//


}
