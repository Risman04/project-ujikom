<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!Auth::check()) {
        //     return redirect('login');
        // }

        $user = Auth::user();   

        if($user->level == 1) {
            return $next($request);
        } elseif ($user->level == 2){
            return $next($request);
        } elseif ($user->level == 3) {
            return $next($request);
        }
    }
}
