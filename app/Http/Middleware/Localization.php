<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
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
        $locales = ['ru', 'en'];
        $locale = session('locale');
        if(in_array($locale, $locales)){
            App::setLocale($locale);
            if($locale == 'ru'){
                session()->forget('locale');
            }
        }else{
            session()->forget('locale');
        }
        return $next($request);
    }
}
