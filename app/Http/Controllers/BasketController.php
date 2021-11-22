<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Classes\Bascet;

class BasketController extends Controller
{
    public function bascet(){
        $order = (new Bascet())->getOrder();
        return view('bascet', compact('order'));
        
    }

    public function order(){
        $order = (new Bascet())->getOrder();
        return view('order', compact('order'));
    }

    public function bascetAdd(Product $product){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            $order = Order::findOrFail($orderId);
        }

        Order::changeFullPrice($product->price);

        if($order->products->contains($product->id)){
            $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($product->id);
        }
        session()->flash('success', 'Добавлен товар ' . $product->name);
        return redirect('bascet');
    }

    public function bascetRemove(Product $product){
        $bascet = new Bascet();
        $order = $bascet->getOrder();
        Order::changeFullPrice(-$product->price);
        if($order->products->contains($product->id)){
            $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
            if($pivotRow->count < 2){
                $order->removeOrder($product->id);
                $order->products()->detach($product->id);   
            }else
                $pivotRow->count--;
                $pivotRow->update();
        }
        session()->flash('warning', 'Удален товар ' . $product->name);
        
        return redirect('bascet');
    }

    public function bascetConfirm(OrderRequest $request){
        $order = (new Bascet())->getOrder();
        
        $order->saveOrder($request->name, $request->phone);
        
        return redirect()->route('index');
    }
}
