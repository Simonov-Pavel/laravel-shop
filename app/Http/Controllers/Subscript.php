<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Product;
use App\Http\Requests\SubscriptionRequest;

class Subscript extends Controller
{
    public function store(SubscriptionRequest $request, Product $product)
    {
        $data = $request->all();
        $data['product_id'] = $product->id;
        Subscription::create($data);
    }
}
