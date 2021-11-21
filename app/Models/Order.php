<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'status', 'user_id'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function getFullPrice(){
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone){
        
        if($this->status == 0){
            $this->name = $name;
            $this->phone = $phone;
            if(auth()->user()) $this->user_id = auth()->user()->id;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            session()->flash('success', 'Ваш заказ в обработке');
            return true;
        }else return false; 
    }

    public function removeOrder($productId){
        if($this->products->count() < 2){
            $this->products()->detach($productId);
            $this->delete();
            session()->forget('orderId');
        }
    }
}
