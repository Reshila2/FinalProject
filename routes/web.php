<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::get('/tour/{id}',[App\Http\Controllers\HomeController::class,'postDetail'])->name('tourDetail');

Route::get('cart', [App\Http\Controllers\HomeController::class,'cart']);
Route::get('add-to-cart/{id}',[App\Http\Controllers\HomeController::class,'addToCart']);
Route::patch('update-cart', [App\Http\Controllers\HomeController::class,'update']);
Route::delete('remove-from-cart',  [App\Http\Controllers\HomeController::class,'remove']);


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin'); // /admin
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
});
