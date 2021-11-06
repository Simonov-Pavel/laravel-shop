<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/bascet', [BasketController::class, 'bascet'])->name('bascet');
Route::get('/bascet/order', [BasketController::class, 'order'])->name('order');
Route::post('/bascet/add/{id}', [BasketController::class, 'bascetAdd'])->name('bascet-add');
Route::post('/bascet/remove/{id}', [BasketController::class, 'bascetRemove'])->name('bascet-remove');
Route::post('/bascet/order', [BasketController::class, 'bascetConfirm'])->name('bascet-confirm');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');

