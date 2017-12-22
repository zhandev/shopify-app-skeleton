<?php

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

Route::namespace('Auth')->group(function () {

    Route::get('install', 'AuthController@install');

    Route::get('auth', 'AuthController@auth');

    Route::get('create-session', 'AuthController@createSession')->name('createSession');

});

Route::namespace('Charge')->group(function () {

    Route::get('check-charge', 'ChargeController@checkCharge')->name('checkCharge');

});

Route::namespace('Shop')->group(function () {

    Route::get('check-shop', 'ShopController@checkShop')->name('checkShop');

});

Route::middleware([])->group(function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

});


