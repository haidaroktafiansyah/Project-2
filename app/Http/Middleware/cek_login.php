<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if(!Auth::check()){
            return redirect('/');
        }

        $user = Auth::user();

        if($user->level == $role){
            return $next($request);
        }
        // return $next($request);
        return redirect('/')->with('error',"no accsess");
    }
}
