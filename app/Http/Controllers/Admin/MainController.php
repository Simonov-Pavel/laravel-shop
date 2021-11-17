<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $orders = Order::where('status', '1')->get();
        $products = Product::get();
        return view('admin.index', compact('orders', 'products'));
    }
}
