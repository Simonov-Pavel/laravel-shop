<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\Bascet;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'status', 'user_id', 'currency_id', 'sum'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count', 'price')->withTimestamps();
    }

    public function currency(){
        return $this->belongsToMany(Currency::class);
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function calculateFullPrice(){
        $sum = 0;
        foreach($this->products()->withTrashed()->get() as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function changeFullPrice($changePrice){
        $sum = self::getFullPrice() + $changePrice;
        session(['full_order_sum' => $sum]);
    }

    public function getFullPrice(){
        $sum = 0;
        foreach($this->products as $product){
            $sum +=$product->price * $product->countInOrder;
        }
        return $sum;
    }

    public function saveOrder($name, $phone){
        
            $this->name = $name;
            $this->phone = $phone;
            if(auth()->user()) $this->user_id = auth()->user()->id;
            $this->status = 1;
            $this->sum = $this->getFullPrice();-
            $products = $this->products;
            $this->save();
            foreach($products as $productInOrder){
                $this->products()->attach($productInOrder, [
                    'count' => $productInOrder->countInOrder,
                    'price' => $productInOrder->price,
                ]);
            }
            session()->forget('order');
            //session()->forget('full_order_sum');
            session()->flash('success', 'Ваш заказ в обработке');
            return true;
    }

    public function removeOrder($productId){
        if($this->products->count() < 2){
            $this->products()->detach($productId);
            $this->delete();
            session()->forget('orderId');
        }
    }
}
