<?php

namespace App\Http\Middleware;

use Closure;
use App;

class LanguageSetter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        if (session()->has('locale')){
            App()->setLocale(session('locale'));
        }
        else {
            App()->setLocale("fr");

        }




        return $next($request);
    }
}
