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

Route::get('/','productController@index');
Route::get('/{id}','productController@show');

Route::get('/products', function () {
    return view('product');
});

Route::get('/payment', function () {
    return view('checkout');
});
