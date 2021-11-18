<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;

class BasketController extends Controller
{
    public function bascet(){
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
            return view('bascet', compact('order'));
        }else{
            session()->flash('warning', 'Ваша карзина пуста');
            return redirect()->route('index');
        } 
        
    }

    public function order(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    public function bascetAdd($productId){ 
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            $order = Order::find($orderId);
        }
        $product = Product::find($productId);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($productId);
        }
        session()->flash('success', 'Добавлен товар ' . $product->name);
        return redirect('bascet');
    }

    public function bascetRemove($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect('bascet');
        }
        $order = Order::find($orderId);
        $product = Product::find($productId);
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->removeOrder($productId);
                $order->products()->detach($productId);   
            }else
                $pivotRow->count--;
                $pivotRow->update();
        }
        session()->flash('warning', 'Удален товар ' . $product->name);
        
        return redirect('bascet');
    }

    public function bascetConfirm(OrderRequest $request){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        if(auth()->user()){
            $request->id = auth()->user()->id;
        }else $request->id = null;
        
        $data = $request->validated();
        $order->saveOrder($request->name, $request->phone, $request->id);
        
        return redirect()->route('index');
    }
}
