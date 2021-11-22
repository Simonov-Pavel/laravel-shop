<?php

namespace App\Classes;

class Bascet
{
    protected $order;

    public function __construct(){
        $orderId = session('orderId');
        $this->order = Order::findOrFail($orderId);
    }
}