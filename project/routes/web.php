<?php

use Illuminate\Support\Facades\Auth;
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
/////////// cart route//////////////////
Route::post('addToCart','CartController@add' );
Route::get('cart','CartController@index' );
Route::post('cart/update','CartController@update' );
Route::get('cart/delete/{id}','CartController@removeItem' );
Route::get('cart/destroy','CartController@destroy' );
Route::get('/cart2', function () {
    return view('cart2');
});
/////////////////////////////
Route::namespace('Backend')->prefix('dashboard')->group(function(){
    // Route::namespace('Backend')->prefix('dashboard')->middleware('admin')->group(function(){

    Route::get('home','HomeController@index');
    
    Route::resource('users','UsersController')->except(['show','delete']);
    Route::delete('users/delete/{id}','UsersController@delete')->name('dashboard/users.delete');

    Route::resource('categories','CategoriesController')->except(['show','delete']);
    Route::delete('categories/delete/{id}','CategoriesController@delete')->name('dashboard/categories.delete');
    
    Route::resource('products','ProductsController')->except(['show','delete']);
    Route::delete('products/delete/{id}','ProductsController@delete')->name('dashboard/products.delete');

    Route::delete('image/delete/{id}','ProductsController@deleteImage')->name('dashboard/image.delete');

    Route::resource('orders','OrdersController')->except(['show','delete']);
    Route::delete('orders/delete/{id}','OrdersController@delete')->name('dashboard/orders.delete');
});
// --------------------------  Route For Dashboard -------------------------------//
// Route::get('login',function(){
//     // return view('login');
// });
// Route::get('register');
Route::get('/','productController@index');
Route::get('/{id}','productController@show');

Route::get('/products', function () {
    return view('product');
});

Route::get('/payment', function () {
    return view('checkout');
});
Route::get('/cart2', function () {
    return view('cart2');
});

// Route::get('/blank',function(){
//     return view('blank');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

