<?php

namespace App\Http\Controllers\Logistics;

use Session;
use Auth;
use DB;
use Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRegister;

class OTPController extends Controller
{
    public function __construct()
    {
 $this->middleware('guest:otp-code')->except('logout');
    }
    public function otp()
    {
        return view('otp');
    }
    public function Register(){
        $userRegister=new UserRegister();
        return  $userRegister;
    }
public function index(Request $request)
{
     $register=$this->Register();
$createOtp=$register->createOTP($request);
$result=json_decode($createOtp);
 if($result->status == 419){
    return redirect()->back()->withErrors([
        'mobile'=> $result->data
    ]);
}
elseif($result->status == 201)
{
     return redirect()->back()->withErrors([
        'mobile'=> $result->data,
        
    ]);
}
 else
{ 
 $my_s=str_split($result->data);
  $firstmobilehidden=$my_s[0].$my_s[1].$my_s[2];
$lastmobilehidden=substr($result->data,-2);
  $request->session()->put(array(
    'mobile'=>$result->data,
    'secondmobile'=> $lastmobilehidden,
        'firstmobile'=> $firstmobilehidden
  ));
  

 return redirect('otp');
}
}
public function resendOTP(Request $request)
{
    $rand=rand(0000,9999);
    $otp_expired=strtotime("+10 minutes");
    $mobile_number=$request->session()->get('mobile');
   if(is_null($mobile_number))
   {
return redirect()->action('Logistics\OTPController@otp');
   }
  $update=DB::table('registeruser')
  ->where('mobile','=', $mobile_number )
  ->update(
    [
         'otp_expire'=>$otp_expired,
        'otp_code'=>$rand,
    ]
    );
     return redirect()->action('Logistics\OTPController@otp');
}

public function loginotp(Request $request)
{
    if($request->otp_code){
        $selectuser=UserRegister::where('otp_code','=', $request->otp_code )
       ->where('mobile','=', session('mobile') )
        ->first();
        if(is_null ( $selectuser)){
        return redirect()->back()->withErrors(
            ['invalid'=>'Invalid OTP'
        ]);
        }
        else
        if(time() > $selectuser->otp_expire )
        {
            return redirect()->back()->withErrors(
                ['invalid'=>'OTP Expired'
            ]);
        }
        $update=DB::table('registeruser')
        ->where('otp_code','=', $request->otp_code )
        ->update([
          'status'=>1  
        ]);
        Auth::guard('otp-code')->login( $selectuser);
         return redirect()->action('Logistics\DashboardController@home');
       
       
    }
    
}
}
