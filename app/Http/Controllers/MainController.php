<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function categories(){
        return view('categories');
    }

    public function category($category){
        return '';
    }

    public function product($category, $product){
        return view('product', compact('category', 'product'));
    }
}
