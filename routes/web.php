<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', 'IndexController@index')->name('home')->middleware('auth', 'verified');

//Home Route - Logged in customer
Route::get('/williescant/customer/home', 'HomeController@customerIndex')->name('customer-home')->middleware('auth', 'verified');

// Profile Route
Route::get('/williescant/user/profile/{id}', 'ProfileController@show')->name('profile')->middleware('auth', 'verified');
Route::post('/williescant/profile/update/{id}', 'ProfileController@update')->name('update')->middleware('auth', 'verified');
Route::post('/williescant/profile/update-password', 'ProfileController@updatePassword')->name('update-password')->middleware('auth', 'verified');

// Customer Order Route
Route::get('/williescant/home/order', 'IndexController@customerOrders')->name('orders')->middleware('auth', 'verified');

// Supplier
Route::post('/williescant/supplier/search', 'ProductController@search')->name('search')->middleware('auth', 'verified');
// Route::get('/williescant/supplier/sales', 'SaleController@index')->name('sales')->middleware('auth', 'verified');
Route::get('/williescant/supplier/shop', 'ProductController@index')->name('supplier-shop')->middleware('auth', 'verified');
Route::get('/williescant/supplier/purchases', 'PurchaseController@index')->name('purchase')->middleware('auth', 'verified');
Route::get('/williescant/supplier/kra', 'IndexController@kra')->name('kra')->middleware('auth', 'verified');
Route::get('/williescant/supplier/home', 'IndexController@home')->name('supplier-home')->middleware('auth', 'verified');
Route::post('/williescant/supplier/switch', 'ProfileController@switch')->name('switch')->middleware('auth', 'verified');

// product
Route::post('williesscant/supplier/add-product', 'ProductController@store')->name('add-product')->middleware('auth', 'verified');
Route::get('/williescant/supplier/get-category', 'IndexController@returnController')->name('get-category')->middleware('auth', 'verified');
Route::get('/williescant/supplier/edit/{id}', 'ProductController@edit')->name('edit-product')->middleware('auth', 'verified');
Route::post('/williescant/supplier/product/update/{id}', 'ProductController@update')->name('update-product')->middleware('auth', 'verified');
Route::post('/williescant/supplier/delete/{id}', 'ProductController@destroy')->name('delete-product')->middleware('auth', 'verified');
Route::post('/williescant/supplier/search', 'ProductController@search')->name('search-product')->middleware('auth', 'verified');
Route::post('/williescant/supplier/product/remove-image', 'ProductController@deleteImage')->name('delete-image')->middleware('auth', 'verified');
Route::get('/williescant/supplier/product/get-product/{id}', 'ProductController@show')->name('get-product')->middleware('auth', 'verified');

//purchase
Route::get('/wiiliescant/supplier/purchase', 'PurchaseController@index')->name('get-purchase')->middleware('auth', 'verified');
Route::post('williescant/supplier/add-purchase', 'PurchaseController@store')->name('add-purchase')->middleware('auth', 'verified');


//Accountant
Route::get('/wiilliescant/supplier/accountants', 'SupplierAccountantController@index')->name('get-accountants')->middleware('auth', 'verified');
Route::get('williescant/supplier/purchase/search/{pin}', 'ProductController@search')->name('search-pin')->middleware('auth', 'verified');

// Export
Route::get('williescant/supplier/exports', 'KraController@index')->name('get-export')->middleware('auth', 'verified');
Route::get('williescant/supplier/export-all', 'KraController@exportPurchase')->name('export-all')->middleware('auth', 'verified');
Route::get('williescant/supplier/export-month', 'KraController@exportCurrentMonth')->name('export-month')->middleware('auth', 'verified');

//Sales
Route::get('williescant/supplier/get-sales', 'SaleController@index')->name('get-sales')->middleware('auth', 'verified');
Route::post('williescant/supplier/add-sale', 'SaleController@store')->name('add-sale')->middleware('auth', 'verified');
Route::get('/williescant/supplier/sale/{id}', 'SaleController@show')->name('retrieve-sale')->middleware('auth', 'verified');
Route::post('/williescant/supplier/sale/del/{id}', 'SaleController@destroy')->name('delete-sale')->middleware('auth', 'verified');
Route::get('/williescant/supplier/sale/edit/{id}', 'SaleController@edit')->name('edit-sale')->middleware('auth', 'verified');

//prepared product
Route::post('/williescant/supplier/prepared-product/{id}', 'ProductController@prepareProduct')->name('prepared-product')->middleware('auth', 'verified');
