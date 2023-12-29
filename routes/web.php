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
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/category/{name}/{id}', 'category')->name('category');
    Route::get('/product-detail/{id}', 'productDetail')->name('product-detail');
    Route::get('/search', 'search')->name('search');
});

// cart
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/save-cart/{id}', 'saveCart')->name('save-cart');
    Route::get('/remove/{id}', 'remove')->name('remove');
    Route::get('/remove-all', 'removeAll')->name('remove-all');
    Route::post('/order', 'order')->name('order');
});


// product
Route::resource('/product', ProductController::class);

// order seller
Route::controller(OrderSeller::class)->group(function () {
    Route::get('/order-seller', 'orderSeller')->name('order-seller');
    Route::get('/order-detail-seller/{id}', 'orderDetailSeller')->name('order-detail-seller');
    Route::put('/update-order/{id}', 'updateOrder')->name('update-order');
});


// user
Route::controller(UserController::class)->group(function () {
    Route::resource('/user');
    Route::get('/user-login', 'login')->name('user-login');
    Route::post('/user-login', 'postLogin')->name('user-login');
    Route::get('/user-logout', 'logout')->name('user-logout');
    Route::get('/change-password', 'changePass')->name('change-password');
    Route::put('/update-password', 'updatePass')->name('update-password');
    Route::post('/comment/{id}', 'comment')->name('comment');
    Route::get('/delete-comment/{id}', 'deleteComment')->name('delete-comment');
});

// order user
Route::controller(OrderUser::class)->group(function () {
    Route::get('/order-history', 'orderHistory')->name('order-history');
    Route::get('/order-detail/{id}', 'orderDetail')->name('order-detail');
});

// admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'home');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::resource('/profile');
});

Route::resource('/categories', CategoryController::class);
Route::resource('/users', UsersController::class);
