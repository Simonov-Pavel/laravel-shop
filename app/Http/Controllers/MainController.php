<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function categories(){
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($category){
        return view('category', compact('category'));
    }

    public function product($category, $product){
        return view('product', compact('category', 'product'));
    }
}
