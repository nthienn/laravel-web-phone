<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderUser;
use App\Http\Controllers\OrderSeller;

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


// home
Route::get('/', [HomeController::class, 'home']);
Route::get('/category/{name}/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/product-detail/{id}', [HomeController::class, 'productDetail'])->name('product-detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/save-cart/{id}', [CartController::class, 'saveCart'])->name('save-cart');
Route::get('/remove/{id}', [CartController::class, 'remove'])->name('remove');
Route::get('/remove-all', [CartController::class, 'removeAll'])->name('remove-all');
Route::post('/order', [CartController::class, 'order'])->name('order');

// product
Route::resource('/product', ProductController::class);

// order
Route::get('/order-seller', [OrderSeller::class, 'orderSeller'])->name('order-seller');
Route::get('/order-detail-seller/{id}', [OrderSeller::class, 'orderDetailSeller'])->name('order-detail-seller');
Route::put('/update-order/{id}', [OrderSeller::class, 'updateOrder'])->name('update-order');

// user
Route::resource('/user', UserController::class);
Route::get('/user-login', [UserController::class, 'login'])->name('user-login');
Route::post('/user-login', [UserController::class, 'postLogin'])->name('user-login');
Route::get('/user-logout', [UserController::class, 'logout'])->name('user-logout');
Route::get('/change-password', [UserController::class, 'changePass'])->name('change-password');
Route::put('/update-password', [UserController::class, 'updatePass'])->name('update-password');
Route::post('/comment/{id}', [UserController::class, 'comment'])->name('comment');
Route::get('/delete-comment/{id}', [UserController::class, 'deleteComment'])->name('delete-comment');

Route::get('/order-history', [OrderUser::class, 'orderHistory'])->name('order-history');
Route::get('/order-detail/{id}', [OrderUser::class, 'orderDetail'])->name('order-detail');

// admin
Route::get('/admin', [AdminController::class, 'home']);
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::resource('/profile', AdminController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/users', UsersController::class);