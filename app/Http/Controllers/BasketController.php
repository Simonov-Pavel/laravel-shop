<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Classes\Bascet;

class BasketController extends Controller
{
    public function bascet(){
        $order = (new Bascet())->getOrder();
        return view('bascet', compact('order'));
        
    }

    public function order(){
        $order = (new Bascet())->getOrder();
        return view('order', compact('order'));
    }

    public function bascetAdd(Product $product){
        $bascet = new Bascet(true);
        $order = $bascet->getOrder();
        $bascet->addBascet($product);
        
        return redirect('bascet');
    }

    public function bascetRemove(Product $product){
        $bascet = new Bascet();
        $order = $bascet->getOrder();
        $bascet->removeBascet($product);
        
        return redirect('bascet');
    }

    public function bascetConfirm(OrderRequest $request){
        $order = (new Bascet())->getOrder();
        $order->updateProduct();
        $order->saveOrder($request->name, $request->phone);
        
        return redirect()->route('index');
    }
}
