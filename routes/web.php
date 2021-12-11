<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\SubscriptController;
use Illuminate\Support\Facades\App;

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');
Route::get('currency/{currency}', [MainController::class, 'changeCurrency'])->name('currency');

Route::group(['middleware' => 'locale'],function(){

    require __DIR__.'/auth.php';



    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::post('/{product}', [SubscriptController::class, 'store'])->name('subscript');

    Route::middleware(['auth'])->group(function(){
        Route::group(['prefix'=>'account'], function(){
            Route::get('/', [App\Http\Controllers\User\MainController::class, 'index'])->name('user');
            Route::resource('orders', App\Http\Controllers\User\OrderController::class);
        });
        Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
            Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
            Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
            Route::get('/order/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.order.show');
            Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
            Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        });
    });


    Route::group(['prefix'=>'bascet'], function(){
        Route::post('/add/{product}', [BasketController::class, 'bascetAdd'])->name('bascet-add');
        Route::group(['middleware' => 'bascetNotEmpty'],function(){
            Route::get('/', [BasketController::class, 'bascet'])->name('bascet');
            Route::get('/order', [BasketController::class, 'order'])->name('order');
            Route::post('/remove/{product}', [BasketController::class, 'bascetRemove'])->name('bascet-remove');
            Route::post('/order', [BasketController::class, 'bascetConfirm'])->name('bascet-confirm');
        });
    
    });

    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', [MainController::class, 'categories'])->name('categories');
        Route::get('/{category}', [MainController::class, 'category'])->name('category');
        Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
    });

});
