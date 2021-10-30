<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/categories', [MainController::class, 'categories']);
Route::get('/{category}', [MainController::class, 'category']);
Route::get('/{category}/{product}', [MainController::class, 'product']);
