<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/bascet', [BasketController::class, 'bascet'])->name('bascet');
Route::get('/order', [BasketController::class, 'order'])->name('order');
Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');

