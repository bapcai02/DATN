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

Route::prefix('auth')->group(function (){
    Route::get('/login', 'Admin\LoginController@showlogin')->name('auth.login');
    Route::post('/login', 'Admin\LoginController@login');
    Route::get('/confirm', 'Admin\LoginController@confirm')->name('auth.confirm');
    Route::post('/p-confirm', 'Admin\LoginController@sendMail');
    Route::get('/set-password/{token}', 'Admin\LoginController@resetPassword')->name('auth.reset');
    Route::post('/set-password', 'Admin\LoginController@resetPassword')->name('auth.set-password');

    Route::any('/logout', 'Admin\LoginController@logout')->name('logout');
});
Route::group(['middleware' => 'checkRole'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    });

    Route::prefix('customer')->group(function () {
        Route::get('/home', 'Customer\HomeController@index')->name('customer.home');
    });
});