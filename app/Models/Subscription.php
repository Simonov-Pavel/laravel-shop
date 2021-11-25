<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Mail\SubscriptionProduct;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'product_id'];

    public function scopeActiveByProductId($query, $productId){
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public static function sendEmailBySubscription(Product $product){
        $subscriptions = self::activeByProductId($product->id)->get();
        foreach($subscriptions as $subscription){
            Mail::to($subscription->email)->send(new SubscriptionProduct($product));
            $subscription->status = 1;
            $subscription -> save();
        }
    }
}
