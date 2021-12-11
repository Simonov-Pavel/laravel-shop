<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;

class BascetNotEmpty
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
        $order = session('order');
        if(!is_null($order)){
            return $next($request);
        }
        session()->forget('order');
        session()->flash('warning', 'Ваша корзина пуста');
        return redirect()->route('index');
    }
}
