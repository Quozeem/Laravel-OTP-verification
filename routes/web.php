<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logistics;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('reqisteruser',[Logistics\RegisterUserController::class,'index']);
Route::post('otps',[Logistics\OTPController::class,'index'])->name('otp');

Route::group(['middleware'=> 'otp_verify'],function () {
Route::get('otp',[Logistics\OTPController::class,'otp']);
Route::post('loginotp',[Logistics\OTPController::class,'loginotp']);
Route::get('resendOTP',[Logistics\OTPController::class,'resendOTP']);
});

Route::post('/',[Logistics\TwilioSMSController::class,'index']);
Route::get('dashboard/home',[Logistics\DashboardController::class,'home'])->middleware('otp_code');
Route::get('/home',function () {
    return view('home'); 
  })->middleware('auth')->name('home');

