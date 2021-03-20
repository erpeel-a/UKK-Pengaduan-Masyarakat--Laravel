<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PetugasRoleMiddleware
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
        if(!auth()->guard('petugas')->check()){
            return redirect()->back();
        }else{
            if(!auth()->guard('petugas')->user()->level === 'admin'){
                return redirect()->back();
            }
            return $next($request);
        }
        return $next($request);
    }
}
