<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [MainController::class, 'index'])->name('index');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
});

Route::group(['prefix'=>'bascet'], function(){
    Route::get('/', [BasketController::class, 'bascet'])->name('bascet');
    Route::get('/order', [BasketController::class, 'order'])->name('order');
    Route::post('/add/{id}', [BasketController::class, 'bascetAdd'])->name('bascet-add');
    Route::post('/remove/{id}', [BasketController::class, 'bascetRemove'])->name('bascet-remove');
    Route::post('/order', [BasketController::class, 'bascetConfirm'])->name('bascet-confirm');
});

Route::group(['prefix' => 'categories'], function(){
    Route::get('/', [MainController::class, 'categories'])->name('categories');
    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
});


