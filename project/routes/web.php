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

/////////// cart route//////////////////
Route::post('/makeOrder','PaymentController@makeorder');

Route::post('/addToCart','CartController@add');
Route::get('cart','CartController@index' )->name('cart');
Route::post('cart/update','CartController@update' );
Route::get('cart/delete/{id}','CartController@removeItem' )->name('cart.delete');
Route::get('cart/destroy','CartController@destroy' );

Route::get('/checkout','PaymentController@index');
Route::get('/shipping/{currency}',function () {
    return "this route for get id payment";});

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
Route::get('login',function(){
    // return view('login');
});
///////////////// tasks of show Products in index ///////////

//Route::resource('product','productController');
Route::get('/','productController@index');
Route::get('/product/{id}','productController@show');
Route::get('/productsCat/{id}', 'productController@productsCat');
Route::get('/productsCatDel', 'productController@productsCatDel');
///////////////////////////////////////

// Route::get('/payment', function () {
//     return view('payment');
// });

// Route::get('/blank',function(){
//     return view('blank');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

