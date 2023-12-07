<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductAjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Route

    Route::prefix('product')->group(function () {
        Route::get('{id}/view', [ProductAjaxController::class, 'view'])->name('product.view');
        Route::get('{id}/edit', [ProductAjaxController::class, 'edit'])->name('product.edit');
        Route::get('create', [ProductAjaxController::class, 'create'])->name('product.create');
        Route::get('{id}/delete', [ProductAjaxController::class, 'destroy'])->name('product.destroy');
        Route::post('product-ajax', [ProductAjaxController::class, 'productsAjax'])->name('product.ajax');
        Route::post('{id}/update', [ProductAjaxController::class, 'update'])->name('product.update');
        Route::post('store', [ProductAjaxController::class, 'store'])->name('product.store');
    });