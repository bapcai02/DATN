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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/detail/{id}','DetailController@index')->name('detail');
Route::get('/categories/{id}','CategoryController@index')->name('categories');
Route::get('/search', 'HomeController@search');

Route::prefix('cart')->group(function (){
    Route::get('/','CartController@index')->name('cart');
    Route::post('/', 'CartController@addCart');
    Route::post('/delete', 'CartController@deleteCart');
    Route::get('/update', 'CartController@updateCart');
    Route::get('/checkout','CartController@checkout');
    Route::get('/quanhuyen','CartController@getQuanHuyen');
    Route::get('/xaphuong','CartController@getXaPhuong');
});

Route::get('/login', 'LoginController@getLogin')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'LoginController@getregister')->name('register');
Route::post('/register', 'LoginController@register');

Route::prefix('auth')->group(function (){
    Route::get('/login', 'Admin\LoginController@showlogin')->name('auth.login');
    Route::post('/login', 'Admin\LoginController@login');
    Route::get('/confirm', 'Admin\LoginController@confirm')->name('auth.confirm');
    Route::post('/p-confirm', 'Admin\LoginController@sendMail');
    Route::get('/set-password/{token}', 'Admin\LoginController@resetPassword')->name('auth.reset');
    Route::post('/set-password', 'Admin\LoginController@resetPassword')->name('auth.set-password');
    Route::any('/logout', 'Admin\LoginController@logout')->name('logout');
});
// Route::group(['middleware' => 'checkrole'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.category'); 
            Route::get('/edit', 'Admin\CategoryController@index')->name('admin.category.edit'); 
            Route::post('/delete', 'Admin\CategoryController@delete')->name('admin.category.delete'); 
            Route::post('/create', 'Admin\CategoryController@create')->name('admin.category.add'); 
        });
    });

    Route::prefix('customer')->group(function () {
        Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
        Route::prefix('product')->group(function () {
            Route::get('/', 'Customer\ProductController@index')->name('customer.product'); 
            Route::get('/edit', 'Customer\ProductController@index')->name('customer.product.edit'); 
            Route::get('/delete', 'Customer\ProductController@index')->name('customer.product.delete'); 
            Route::get('/add', 'Customer\ProductController@index')->name('customer.product.add'); 
        });
    });
// });