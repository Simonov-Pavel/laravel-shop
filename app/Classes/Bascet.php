<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;

class Bascet
{
    protected $order;

    public function __construct($order=false){
        
        $orderId = session('orderId');
        if($order){
            if(is_null($orderId)){
                $this->order = Order::create();
                session(['orderId' => $this->order->id]);
            }else{
                $this->order = Order::findOrFail($orderId);
            }
        }else{
            $this->order = Order::findOrFail($orderId);
        }
    }

    public function getOrder(){
        return $this->order;
    }

    protected function getPivotRow($product){
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }

    public function addBascet(Product $product){
        if($this->order->products->contains($product->id)){
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if($pivotRow->count > $product->count){
                session()->flash('warning', 'Максимальное количество выбранного товара - ' . $product->name);
                return false;
            }
            
            $pivotRow->update();
        }else{
            $this->order->products()->attach($product->id);
        }
        Order::changeFullPrice($product->price);
        session()->flash('success', 'Добавлен товар ' . $product->name);
    }

    public function removeBascet(Product $product){
        Order::changeFullPrice(-$product->price);
        if($this->order->products->contains($product->id)){
            $pivotRow = $this->getPivotRow($product);
            if($pivotRow->count < 2){
                session()->forget('full_order_sum');
                $this->order->removeOrder($product->id);
                $this->order->products()->detach($product->id);   
            }else
                $pivotRow->count--;
                $pivotRow->update();
        }
        session()->flash('warning', 'Удален товар ' . $product->name);
    }

    public function updateProduct(){
        foreach($this->order->products as $product){
            $product->count -= $this->getPivotRow($product)->count;
        }
        $this->order->products->map->save();
        return true;
    }
}