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

    Route::post('/notice','Admin\HomeController@notice')->name('admin.notice');
    Route::delete('/notice','Admin\HomeController@notice_delete')->name('admin.notice.delete');
    Route::put('/notice','Admin\HomeController@notice_edit')->name('admin.notice.edit');
    Route::get('/notice/{id}','Admin\HomeController@notice_view')->name('admin.notice.view');

    Route::post('/video','Admin\HomeController@video')->name('admin.video');
    Route::delete('/video','Admin\HomeController@video_delete')->name('admin.video.delete');

    Route::post('/partner','Admin\PartnerController@partner')->name('admin.partner');
    Route::delete('/partner','Admin\PartnerController@partner_delete')->name('admin.partner.delete');
    Route::put('/partner','Admin\PartnerController@partner_edit')->name('admin.partner.edit');
});

Route::get('/sponsor', 'GuestController@sponsor')->name('sponsor');

