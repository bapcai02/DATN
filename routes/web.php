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
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('/detail/{id}','DetailController@index')->name('detail');
Route::get('/categories/{id}','CategoryController@index')->name('categories');
Route::get('/search', 'HomeController@search');
Route::get('rating','DetailController@rating');
Route::get('filter','CategoryController@FilterByPrice');

Route::prefix('user')->group(function (){
    Route::get('/', 'UserProfileController@index');
    Route::post('/update','UserProfileController@update');
});

Route::get('/customers/{id}', 'CustomerController@index');

Route::prefix('cart')->group(function (){
    Route::get('/', 'CartController@index')->name('cart');
    Route::post('/', 'CartController@addCart');
    Route::post('/delete', 'CartController@deleteCart');
    Route::get('/coupon', 'CartController@CartCoupon');
    Route::get('/update', 'CartController@updateCart');
    Route::get('/checkout/{id}', 'CartController@checkout');
    Route::get('/quanhuyen', 'CartController@getQuanHuyen');
    Route::get('/xaphuong', 'CartController@getXaPhuong');
});

Route::get('/vnpay_php', 'PaymentController@getPayment');
Route::get('/vnpay_php/return', 'PaymentController@returnUrl');
Route::post('/payment', 'PaymentController@payment');

Route::prefix('usercart')->group(function (){
    Route::get('/','UserCartController@index')->name('cart');
    Route::post('/add', 'UserCartController@addCart');
    Route::post('/delete', 'UserCartController@deleteCart');
    Route::get('/update', 'UserCartController@updateCart');
    Route::post('/order', 'OrderController@create');
    Route::get('/quanhuyen', 'UserCartController@getQuanHuyen');
    Route::get('/xaphuong', 'UserCartController@getXaPhuong');
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

Route::group(['middleware' => 'checkadmin'], function () {
    Route::prefix('admins')->group(function () {
        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
        
        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.category'); 
            Route::post('/edit', 'Admin\CategoryController@edit')->name('admin.category.edit'); 
            Route::post('/delete', 'Admin\CategoryController@delete')->name('admin.category.delete'); 
            Route::post('/create', 'Admin\CategoryController@create')->name('admin.category.add');
            Route::get('/search', 'Admin\CategoryController@search')->name('admin.category.search');
        });

        Route::prefix('customer')->group(function () {
            Route::get('/', 'Admin\CustomerController@index')->name('customer'); 
            Route::post('/edit', 'Admin\CustomerController@edit')->name('customer.edit'); 
            Route::post('/delete', 'Admin\CustomerController@delete')->name('customer.delete'); 
            Route::post('/create', 'Admin\CustomerController@create')->name('customer.add');
            Route::get('/search', 'Admin\CustomerController@search')->name('customer.search');
        });

        Route::prefix('addressShip')->group(function () {
            Route::get('/', 'Admin\AddressController@index')->name('addressShip'); 
            Route::post('/editTinh', 'Admin\AddressController@editTinh'); 
            Route::post('/deleteTinh', 'Admin\AddressController@deleteTinh'); 
            Route::post('/createTinh', 'Admin\AddressController@createTinh');
            Route::post('/editHuyen', 'Admin\AddressController@editHuyen'); 
            Route::post('/deleteHuyen', 'Admin\AddressController@deleteHuyen'); 
            Route::post('/createHuyen', 'Admin\AddressController@createHuyen');
            Route::post('/editXa', 'Admin\AddressController@editXa'); 
            Route::post('/deleteXa', 'Admin\AddressController@deleteXa'); 
            Route::post('/createXa', 'Admin\AddressController@createXa');
        });
        
        Route::prefix('coupon')->group(function () {   
            Route::get('/', 'Admin\CouponController@index'); 
            Route::post('/edit', 'Admin\CouponController@edit'); 
            Route::post('/delete', 'Admin\CouponController@delete'); 
            Route::post('/create', 'Admin\CouponController@create');
            Route::get('/search', 'Admin\CouponController@search');
        });

        Route::prefix('user')->group(function () {   
            Route::get('/', 'Admin\UserController@index'); 
        });

        Route::prefix('brand')->group(function () {   
            Route::get('/', 'Admin\BrandController@index'); 
            Route::post('/edit', 'Admin\BrandController@edit'); 
            Route::post('/delete', 'Admin\BrandController@delete'); 
            Route::post('/create', 'Admin\BrandController@create');
            Route::get('/search', 'Admin\BrandController@search');
        });

        Route::prefix('order')->group(function () {   
            Route::get('/', 'Admin\OrderController@index'); 
            Route::get('/search', 'Admin\OrderController@search');
        });

        Route::prefix('slider')->group(function () {   
            Route::get('/', 'Admin\SliderController@index'); 
            Route::post('/delete', 'Admin\SliderController@delete'); 
            Route::post('/create', 'Admin\SliderController@create');
        });

        Route::prefix('product')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('customer.product'); 
            Route::get('/search', 'Admin\ProductController@search')->name('customer.product.search'); 
        });
    });
});

Route::group(['middleware' => 'checkcustomer'], function () {
    Route::prefix('customer')->group(function () {
        Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
        Route::prefix('product')->group(function () {
            Route::get('/', 'Customer\ProductController@index')->name('customer.product'); 
            Route::get('/edit', 'Customer\ProductController@edit')->name('customer.product.edit'); 
            Route::post('/delete', 'Customer\ProductController@delete')->name('customer.product.delete'); 
            Route::get('/add', 'Customer\ProductController@add')->name('customer.product.add'); 
            Route::post('/create', 'Customer\ProductController@create')->name('customer.product.add'); 
            Route::get('/search', 'Customer\ProductController@search')->name('customer.product.search'); 
        });

        Route::prefix('order')->group(function () {
            Route::get('/', 'Customer\OrderController@index')->name('customer.order'); 
            Route::get('/search', 'Customer\OrderController@search')->name('customer.order.search'); 
        });
    });
});

Route::group(['middleware' => 'checkshiper'], function () {
    Route::prefix('shiper')->group(function () {
        Route::get('/home', 'Customer\HomeController@index')->name('shiper.home');
        Route::prefix('product')->group(function () {
            Route::get('/', 'Customer\ProductController@index')->name('shiper.product'); 
            Route::get('/edit', 'Customer\ProductController@index')->name('shiper.product.edit'); 
            Route::get('/delete', 'Customer\ProductController@index')->name('shiper.product.delete'); 
            Route::get('/add', 'Customer\ProductController@index')->name('shiper.product.add'); 
        });
    });
});