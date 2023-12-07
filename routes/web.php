<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('cat_tree_view');
});

Route::get('category-tree-view', [CategoryController::class, 'manageCategory'])->name('cat_tree_view');
Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add_cat');
Route::post('{id}/delete', [CategoryController::class, 'destroy'])->name('destroy');