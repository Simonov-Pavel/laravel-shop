<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class BasketController extends Controller
{
    public function bascet(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('bascet', compact('order'));
    }

    public function order(){
        return view('order');
    }

    public function bascetAdd($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session('orderId', $order->id);
        }else{
            $order = Order::find($orderId);
        }
        $order->products()->attach($productId);

        return view('bascet', compact('order'));
    }
}
