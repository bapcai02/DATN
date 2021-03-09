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
});
Route::group(['middleware' => 'checkRole'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    });

    Route::prefix('customer')->group(function () {
        Route::get('/home', 'Admin\HomeController@index')->name('customer.home');
    });
});