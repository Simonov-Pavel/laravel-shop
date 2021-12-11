<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use App\Services\Currency\CurrencyConversion;
use Illuminate\Support\Facades\Auth;

class Bascet
{
    protected $order;

    public function __construct($createOrder=false){
        
        $order = session('order');
            if(is_null($order) && $createOrder){
                $data = [];
                if(Auth::check()){
                    $data['user_id'] = Auth::id();
                }
                $data['currency_id'] = CurrencyConversion::getCurrentCurrencyFromSession()->id;
                $this->order = new Order($data);
                session(['order' => $this->order]);
            }else{
                $this->order = $order;
            }
    }

    public function getOrder(){
        return $this->order;
    }

    // protected function getPivotRow($product){
    //     return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    // }

    public function addBascet(Product $product){
        if($this->order->products->contains($product)){
            $pivotRow = $this->order->products->where('id', $product->id)->first();
            
            if($pivotRow->countInOrder >= $product->count){
                session()->flash('warning', 'Максимальное количество выбранного товара - ' . $product->name);
                return false;
            }
            $pivotRow->countInOrder++;
        }else{
            $product->countInOrder = 1;
            $this->order->products->push($product);
        }
        //Order::changeFullPrice($product->price);
        session()->flash('success', 'Добавлен товар ' . $product->name);
    }

    public function removeBascet(Product $product){
        //Order::changeFullPrice(-$product->price);
        if($this->order->products->contains($product)){
            $pivotRow = $this->order->products->where('id', $product->id)->first();
            if($pivotRow->countInOrder < 2){
                //session()->forget('full_order_sum');
                //$this->order->removeOrder($product->id);
                $this->order->products->pop($product);
            }else
                $pivotRow->countInOrder--;
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