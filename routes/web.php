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

Route::get('/','GuestController@index')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'  =>  'admin'], function () {
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::post('login', 'Admin\LoginController@login');
    Route::get('login', function(){
        return view('admin.login');
    })->name('admin.login');

    Route::get('/','Admin\HomeController@index')->name('admin');
    Route::post('/slider','Admin\HomeController@slider')->name('admin.slider');
    Route::delete('/slider','Admin\HomeController@slider_delete')->name('admin.slider.delete');
});
