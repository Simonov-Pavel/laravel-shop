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
        return view('category', compact('category'));
    }

    public function product($catategory = null, $product){
       // $category = Category::where('code', $category)->first();
        $product = Product::where('code', $product)->first();
        return view('product', compact('product'));
    }

    public function bascet(){
        return view('bascet');
    }

    public function order(){
        return view('order');
    }
}
