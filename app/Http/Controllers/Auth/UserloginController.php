<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\Registration;
use Illuminate\Support\Facades\Session;
class UserloginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }
    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->intended('buyer');
    }
    public function Login(Request $request)
    {
      $log_detail=array(
        'email' =>$request->get('email'),
        'password' =>$request->get('password'),
      );
      if(Auth::guard('customer')->attempt( $log_detail,$request->filled('remember'))) {
      return  redirect()->route('logincustomer');
      }
      else{
        Session::flash('errorMessage','INVALID LOGIN DETAILS');
        return redirect()->back();
      }
    }
  
}
