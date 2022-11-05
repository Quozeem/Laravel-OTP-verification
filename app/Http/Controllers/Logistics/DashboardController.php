<?php
namespace App\Http\Controllers\Logistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
 //$this->middleware('guest:otp-code')->except('logout');
    }
    public function home()
{
    return view('dashboard.user');
}
}
