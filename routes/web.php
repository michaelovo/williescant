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

Auth::routes(['verify' => true]);

// Home Route - logged out / unregistered users
Route::get('/', 'IndexController@index')->name('home');

//Home Route - Logged in customer
Route::get('/supplier/home', 'ReadySaleController@supplierStore')->name('index')->middleware('auth','verified');

// Profile Route
Route::get('/williescant/user/profile/{id}', 'ProfileController@show')->name('profile')->middleware('auth', 'verified');
Route::post('/williescant/profile/update/{id}', 'ProfileController@update')->name('update')->middleware('auth', 'verified');
Route::post('/williescant/profile/update-password', 'ProfileController@changePassword')->name('update-password')->middleware('auth', 'verified');

// Customer Order Route
Route::get('/williescant/home/order', 'IndexController@customerOrders')->name('orders')->middleware('auth', 'verified');

// Supplier
Route::get('/williescant/supplier/dashboard', 'ProductController@index')->name('shop')->middleware('auth', 'verified');
Route::post('/williescant/supplier/search', 'ProductController@search')->name('search')->middleware('auth', 'verified');
Route::get('/williescant/supplier/sales', 'SaleController@index')->name('sales')->middleware('auth', 'verified');
Route::get('/williescant/supplier/shop', 'ProductController@index')->name('supplier-shop')->middleware('auth', 'verified');
Route::get('/williescant/supplier/purchases', 'PurchaseController@index')->name('purchase')->middleware('auth', 'verified');
Route::get('/williescant/supplier/kra', 'IndexController@kra')->name('kra')->middleware('auth', 'verified');

