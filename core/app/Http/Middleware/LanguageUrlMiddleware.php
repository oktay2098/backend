<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageUrlMiddleware
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
        if(isset($_GET['lang'])){
            if ($_GET['lang'] == 'en') {
            session()->put('lang', 'en');
                app()->setLocale(session('lang',  'en'));
            }else if ($_GET['lang'] == 'ar') {
                session()->put('lang', 'ar');
                    app()->setLocale(session('lang',  'ar'));
                }
            
            return $next($request);
        }
        
        else{
            return $next($request);
        }
    }
}
