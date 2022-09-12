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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/search', 'App\Http\Controllers\ProductController@search')->name("product.search");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
    Route::get('/my-account/orders/pdf/{id}', 'App\Http\Controllers\MyAccountController@pdf')->name("myaccount.pdf");
});

Route::middleware('admin')->group(function () {
    //Admin section
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/suppliers', 'App\Http\Controllers\Admin\AdminSupplierController@index')->name("admin.supplier.index");
    Route::get('/admin/suppliers/{id}', 'App\Http\Controllers\Admin\AdminSupplierController@show')->name("admin.supplier.show");

    //Admin section CRUD
    Route::post('/admin/suppliers/create', 'App\Http\Controllers\Admin\AdminSupplierController@create')->name("admin.supplier.create");
    Route::delete('/admin/suppliers/{id}/delete', 'App\Http\Controllers\Admin\AdminSupplierController@delete')->name("admin.supplier.delete");
    Route::get('/admin/suppliers/{id}/edit', 'App\Http\Controllers\Admin\AdminSupplierController@edit')->name("admin.supplier.edit");
    Route::put('/admin/suppliers/{id}/update', 'App\Http\Controllers\Admin\AdminSupplierController@update')->name("admin.supplier.update");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
    Route::get('/admin/historyProduct/{id}', 'App\Http\Controllers\Admin\AdminProductHistoryController@index')->name("admin.historyProduct.index");
});

Auth::routes();
