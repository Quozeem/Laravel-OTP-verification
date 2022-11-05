<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Session;
use Exception;
use Twilio\Rest\Client;
use DB;
use Redirect;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class UserRegister extends Authenticatable
{
    use HasFactory;
    public $guard='otp-code';
    protected $table='registeruser';
    public $timestamps=false;
    protected $fillable=[
'name','mobile','email','password','otp_code','otp_expire'
,'status'
    ];

    public function createOTP($request)
{
    $rand=rand(0000,9999);
    $otp_expired=strtotime("+10 minutes");
    $data_all=array(
        'otp_expire'=>$otp_expired,
      'name'=>$request->name,
      'otp_code'=>$rand,
      'email'=>$request->email,
      'mobile'=>$request->mobile,
    );
   if(is_null($request->mobile)) {
    $erros=[
        'status'=>419,
        'data'=>'Phone is Required'
        ];
    }
   elseif($request->mobile){
    $select=DB::table('registeruser')
   ->where('mobile' ,'=',$request->mobile)
    ->first();
    if($select)
    {
        $erros=[
            'status'=>201,
            'data'=>'Phone Already Exits'
            ];  
    }
    else{
        $receiverNumber = $request->mobile;
        $message = "Your OTP code".' '. $rand;
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
                $insert=DB::table('registeruser')
                ->insert( $data_all);
                $erros=[
                  'status'=>200,
                  'data'=>$request->mobile
                  ];
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        } 
  
    }
   }
   return json_encode($erros);
}
}
