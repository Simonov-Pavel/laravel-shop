<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('welcome', compact('products'));
    }

    public function categories(){
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code){
        $category = Category::where('code', $code)->first();
        $products = Product::get();
        return view('category', compact('category', 'products'));
    }

    public function product($category, $product){
        return view('product', compact('category', 'product'));
    }

    public function bascet(){
        return view('bascet');
    }

    public function order(){
        return view('order');
    }
}
