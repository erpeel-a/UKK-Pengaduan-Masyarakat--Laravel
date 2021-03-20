<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guards = null)
    {
        if($guards == 'petugas' && Auth::guard($guards)->check()){
            return redirect('home/petugas');
        }

        if($guards == 'masyarakat' && Auth::guard($guards)->check()){
            return redirect('home/masyarakat');
        }
        if (Auth::guard($guards)->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
