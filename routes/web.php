<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/product/{products}', [App\Http\Controllers\ProductController::class, 'show']);
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::get('/result/{search}', [App\Http\Controllers\ProductController::class, 'result']);
Route::post('/searching/{search}', [App\Http\Controllers\ProductController::class, 'searching']);

Route::get('/shopping-cart', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/orderList', [App\Http\Controllers\OrderController::class, 'orderList']);
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout']);
Route::get('/order/{order}', [App\Http\Controllers\OrderController::class, 'show']);
Route::post('/addToCart/{products}', [App\Http\Controllers\OrderController::class, 'addToCart']);
Route::post('/removeFromCart/{products}', [App\Http\Controllers\OrderController::class, 'removeFromCart']);
Route::post('/cancelOrder/{products}', [App\Http\Controllers\OrderController::class, 'cancelOrder']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/admin/productList', [App\Http\Controllers\AdminController::class, 'productList']);
Route::get('/admin/orderList', [App\Http\Controllers\AdminController::class, 'orderList']);
Route::get('/admin/userList', [App\Http\Controllers\AdminController::class, 'userList']);
Route::get('/admin/order/{order}', [App\Http\Controllers\AdminController::class, 'orderUpdate']);
Route::post('/admin/orderUpdate/{order}', [App\Http\Controllers\AdminController::class, 'storeOrderUpdate']);
Route::get('/admin/newProduct', [App\Http\Controllers\AdminController::class, 'createNewProduct']);
Route::post('/admin/storeNewProduct', [App\Http\Controllers\AdminController::class, 'storeNewProduct']);
Route::get('/admin/product/{product}/edit', [App\Http\Controllers\AdminController::class, 'editProduct']);
Route::patch('/admin/product/{product}', [App\Http\Controllers\AdminController::class, 'updateProduct']);







