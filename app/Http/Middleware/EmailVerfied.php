<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmailVerfied
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $user=$request->user();
        $user=Auth::user();
        if($user->email_verified){
            return $next($request);
        }
        return redirect( route('login'));
    }
}
