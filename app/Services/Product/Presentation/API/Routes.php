<?php

use App\Services\Product\Presentation\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/product')->as('api.product.')->controller(ProductController::class)->group(function(){
    Route::post('', 'store')->name('store');
    Route::get('seed', 'seed')->name('seed');
});

