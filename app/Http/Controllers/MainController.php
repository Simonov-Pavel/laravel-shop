<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index(Request $request){
        $productsQuery = Product::with('category');
        if($request->filled('price_from')){
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if($request->filled('price_to')){
            $productsQuery->where('price', '<=', $request->price_to);
        }
        foreach(['hit', 'new', 'recomend'] as $field){
            if($request->has($field)){
                $productsQuery->$field();
            }
        }
        $products = $productsQuery->paginate(6)->withPath('?' . $request->getQueryString());
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

    public function product($catategory, $product){
        $product = Product::where('code', $product)->first();
        return view('product', compact('product'));
    }

    
}
