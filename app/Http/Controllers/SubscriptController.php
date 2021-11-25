<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Product;
use App\Http\Requests\SubscriptionRequest;

class SubscriptController extends Controller
{
    public function store(SubscriptionRequest $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id
        ]);
        return redirect()->back()->with('success', "Спасибо, мы сообщим вам о поступлении $product->name");
    }
}
