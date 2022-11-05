<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class OTPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null(Auth::guard('otp-code')->user()))
        {
        return redirect('reqisteruser');//->back()->withErrors($validator)->withInput();
        }
        return $next($request);
    }
}
