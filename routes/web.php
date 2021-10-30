<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/{category}/{product}', function () {
    return view('product');
});
