<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Orders;
use App\Models\OrdersDetail;
use Session;
use DB;

class AccountController extends Controller
{
    public function home_account(){  //หน้า home Account

        $customer_id = Session::get('cid') ;
        $customer    = User::find($customer_id);

        //ที่อยู่
        $addressOn   = Address::where('address_status','=','on')->where('customer_id', $customer_id)->first();
        $addressOff  = Address::where('address_status','=','off')->where('customer_id', $customer_id)->get();

        //การสั่งซื้อของฉัน
        $myOrderDetails  = OrdersDetail::where('customer_id', $customer_id)->groupBy('code_orders')->orderBy('created_at', 'desc')->get(['code_orders']);

        //ออร์เดอร์ที่ยังไม่ชำระเงิน
        $Orders      = Orders::where('customer_id', $customer_id)->groupBy('code_orders')->orderBy('created_at', 'desc')->get(['code_orders']);

        return view('pages.account.homeAccount')
        ->with([ 'customer' => $customer, 'addressOn' => $addressOn, 'addressOff' => $addressOff, 'myOrderDetails' => $myOrderDetails, 'Order' => $Orders ]);
    }

    //-------------------------------------------------------------------------------------//

    public function updateProfile(Request $request ){ // อัพเดตข้อมูล Profile
        DB::beginTransaction();
        try {

            $customer_id                  = Session::get('cid') ;
            $customer                     = User::findOrFail($customer_id);
            $customer->customer_username  = $request->customer_username;
            $customer->customer_name      = $request->customer_name;
            $customer->customer_lname     = $request->customer_lname;
            $customer->customer_email     = $request->customer_email;
            $customer->customer_phone     = $request->customer_phone;
            $customer->customer_birthday  = $request->customer_birthday;

            $customer->save();

            DB::commit();
            return redirect('/home_account')->with('success', 'อัพเดตข้อมูลสำเร็จ');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/home_account')->withError('ไม่สามารถอัพเดตข้อมูลได้ !');
        }
    }

    //-------------------------------------------------------------------------------------//

    public function addAddress(Request $request){ //เพิ่มข้อมูลที่อยู่ 
        DB::beginTransaction();
        try {

            $customer_id                 = Session::get('cid') ;
            $address = new Address;
            $address->customer_id        = $customer_id ;
            $address->customer_name      = $request->customer_name;
            $address->customer_phone     = $request->customer_phone;
            $address->customer_address   = $request->customer_address;
            $address->customer_tumbon    = $request->customer_tumbon;
            $address->customer_district  = $request->customer_district;
            $address->customer_province  = $request->customer_province;
            $address->customer_postcode  = $request->customer_postcode;

            $address->save();

            $check_addon    =  Address::where('address_status','=','on')->where('customer_id', $customer_id)->first();
            if($check_addon == null){  
                Address::where('customer_id', $customer_id)->update(['address_status'=>'on']);
            }

            DB::commit();
            return back()->with('success', 'เพิ่มข้อมูลที่อยู่สำเร็จ');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/home_account')->withError('ไม่สามารถเพิ่มข้อมูลได้ !');
        }
    }

    //-------------------------------------------------------------------------------------//

    public function changeAddress($id){ // เปลี่ยนที่อยู่ใหม่ (ค่าเริ่มต้น)
        DB::beginTransaction();
        try {

            $customer_id = Session::get('cid') ;
            $p           = Address::where('customer_id', $customer_id)->update(['address_status'=>'off']);
            $p           = Address::where('customer_address_id',$id)->update(['address_status'=>'on']);
            
            DB::commit();
            return back()->with('success', 'เปลี่ยนค่าเริ่มต้นที่อยู่ เรียบร้อย !');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/home_account')->withError('ไม่สามารถเพิ่มข้อมูลได้ !');
        }
    }

    //-------------------------------------------------------------------------------------//

    public function delAddress($id)
    {
        DB::beginTransaction();
        try {

            $delAddress = Address::destroy($id);

            DB::commit();
            return redirect('/home_account')->with('success', 'ลบข้อมูลที่อยู่สำเร็จ');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/home_account')->withError('ลบข้อมูลไม่สำเร็จ');
        }
    }

    //-------------------------------------------------------------------------------------//


}
