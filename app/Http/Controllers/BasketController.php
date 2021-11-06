<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\OrderRequest;
use App\Models\Order;

class BasketController extends Controller
{
    public function bascet(){
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('bascet', compact('order'));
    }

    public function order(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            redirect('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    public function bascetAdd($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create()->id;
            session(['orderId' => $order]);
        }else{
            $order = Order::find($orderId);
        }
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($productId);
        }

        return redirect('bascet');
    }

    public function bascetRemove($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect('bascet');
        }
        $order = Order::find($orderId);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            }else
                $pivotRow->count--;
                $pivotRow->update();
        }
        
        return redirect('bascet');
    }

    public function bascetConfirm(OrderRequest $request){
        $data = $request->validated();
        $data['status'] = 1;
        Order::firstOrCreate($data);
       
        return redirect()->route('index');
    }
}
