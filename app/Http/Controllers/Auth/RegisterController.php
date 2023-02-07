<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Customer;
use App\Models\OtpRegister;
use Illuminate\Http\Request;
use Session;
use DB;
use Socialite;
use Mail;
use Carbon\Carbon;
use App\Mail\MailNotify;

class RegisterController extends Controller
{
    public function register(){ 

        return view('pages.auth.register');
    }

    //-------------------------------------------------------------------------------------//

    public function createAccount(Request $request) //สมัครสมาชิก
    {
        DB::beginTransaction();
        try {

            $customer = new Customer();
            $customer->customer_email    = $request->customer_email;
            $customer->customer_phone    = $request->customer_phone;
            $customer->customer_username = $request->customer_username;
            $customer->customer_password = Hash::make($request['customer_password']);
            $customer->save();

            Session::put('cid',$customer->customer_id );

            $otp   = substr(md5(mt_rand()), 0, 8) ; //สุ่มตัวเลข
            $email = $request->customer_email;

            //บันทึก OTP เข้า database
            OtpRegister::create([ 'otp_code' => $otp, 'otp_email' => $email, 'otp_ref' => hexdec(uniqid()) ]);
        
            $data = [ //ข้อมูลที่ส่งไปใน email 
                'subject'=>'['.$otp.'] คือรหัสยืนยันของคุณ',
                'body'=>'รหัสยืนยันตัวตนของคุณคือ ['.$otp.']'
            ];

            Mail::to($email)->send(new MailNotify($data));

            DB::commit();
            return view('pages.auth.registerOTP')->with(['email'=>$email]);    
        
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/register')->withError('ลงทะเบียนไม่สำเร็จ');
        }
    }

    //-------------------------------------------------------------------------------------//

    public function checkOtpRegister(Request $request)
    {
        DB::beginTransaction();
        try {

            $otp_email  = $request->otp_email;
            $otp_code   = $request->otp_code;
        
            $email_otp = OtpRegister::where(['otp_code' => $otp_code, 'otp_email'=>$otp_email])->first();
            
            if ($email_otp != null) {
                $otp_ids   = $email_otp->otp_id;
                return redirect('/delOtp/'.$otp_ids.''); 

            } else {
               
                return view('pages.auth.registerOTP')->with(['email'=>$otp_email, 'success' => 'รหัส OTP ไม่ตรงกัน กรุณากรอกใหม่']);       
            }

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/register')->withError('ลงทะเบียนไม่สำเร็จ');
        }

    }

    //-------------------------------------------------------------------------------------//

    public function delOtp($id){ 

        $otpId = $id ;
        
        $delOtp = OtpRegister::destroy($otpId);

        Session::flush();
 
        return redirect('/login')->with('success','คุณสมัครสมาชิกเรียบร้อยแล้ว');
    }

    //-------------------------------------------------------------------------------------//


}
