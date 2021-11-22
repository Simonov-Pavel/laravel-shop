<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::active()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function show(Order $order){
        $products = $order->products()->withTrashed()->get();
        return view('admin.order-show', compact('order', 'products'));
    }
}
