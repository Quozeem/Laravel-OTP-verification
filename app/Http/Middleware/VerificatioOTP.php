<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificatioOTP
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
        if(is_null(session('mobile')))
        {
        return redirect('reqisteruser');//->back()->withErrors($validator)->withInput();
      
        }
        return $next($request);
    }
}
