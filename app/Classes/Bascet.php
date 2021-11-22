<?php

namespace App\Classes;

use App\Models\Order;

class Bascet
{
    protected $order;

    public function __construct(){
        $orderId = session('orderId');
        $this->order = Order::findOrFail($orderId);
    }

    public function getOrder(){
        return $this->order;
    }
}