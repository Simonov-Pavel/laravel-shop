<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function bascet(){
        return view('bascet');
    }

    public function order(){
        return view('order');
    }
}
