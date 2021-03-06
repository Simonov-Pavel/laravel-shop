<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Classes\Bascet;
use App\Mail\OrderCreated;

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
        $email = Auth::check() ? Auth::user()->email : $request->email;
        $bascet = new Bascet();
        $order = $bascet->getOrder();
        $bascet->updateProduct();
        $order->saveOrder($request->name, $request->phone);
        Mail::to($email)->send(new OrderCreated($request->name, $order));
        return redirect()->route('index');
    }
}
