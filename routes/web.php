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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/williescant/home/dashboard/customer', 'HomeController@index')->name('home')->middleware('auth','verified');
Route::get('/williescant/user/profile/{id}', 'ProfileController@show')->name('profile')->middleware('auth', 'verified');
Route::post('/williescant/profile/update/{id}', 'ProfileController@update')->name('update')->middleware('auth', 'verified');
Route::post('/williescant/profile/update-password', 'ProfileController@changePassword')->name('update-password')->middleware('auth', 'verified');
