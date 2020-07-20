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
    Route::post('/password','Admin\HomeController@password_change')->name('admin.password.change');

    Route::post('/slider','Admin\HomeController@slider')->name('admin.slider');
    Route::delete('/slider','Admin\HomeController@slider_delete')->name('admin.slider.delete');

    Route::post('/video','Admin\HomeController@video')->name('admin.video');
    Route::delete('/video','Admin\HomeController@video_delete')->name('admin.video.delete');

    Route::post('/volunteer/approve','Admin\HomeController@approve_action')->name('admin.volunteer.action');
    Route::delete('/volunteer/delete','Admin\HomeController@volunteer_delete')->name('admin.volunteer.delete');

    Route::post('/footer','Admin\HomeController@footer')->name('admin.footer');
    Route::put('/footer','Admin\HomeController@footer_action');

    Route::get('/partner','Admin\PartnerController@index')->name('admin.partner');
    Route::post('/partner','Admin\PartnerController@partner')->name('admin.partner');
    Route::delete('/partner','Admin\PartnerController@partner_delete')->name('admin.partner.delete');
    Route::put('/partner','Admin\PartnerController@partner_edit')->name('admin.partner.edit');

    Route::get('/event','Admin\EventController@index')->name('admin.event');
    Route::post('/event/upcoming','Admin\EventController@upcoming')->name("admin.event.upcoming");
    Route::put('/event/upcoming','Admin\EventController@upcoming_action')->name("admin.event.upcoming");
    Route::post('/event/ongoing','Admin\EventController@ongoing')->name("admin.event.ongoing");
    Route::put('/event/ongoing','Admin\EventController@ongoing_action')->name("admin.event.ongoing");
    Route::delete('/event/closed','Admin\EventController@closed')->name("admin.event.closed");

    Route::get('/member','Admin\MemberController@index')->name('admin.member');
    Route::post('/member','Admin\MemberController@create')->name('admin.member');
    Route::put('/member','Admin\MemberController@action')->name('admin.member.action');
});

Route::get('/partner', 'GuestController@partner')->name('partner');
Route::get('event/{id}','GuestController@event_view')->name('event.view');
Route::get('/event','GuestController@event')->name('event');
Route::get('/member','GuestController@member')->name('member');
Route::get('/contact','GuestController@contact')->name('contact');
Route::post('/contact','GuestController@contact_mail');
Route::get('/volunteer/registration','GuestController@volunteer')->name('volunteer');
Route::post('/volunteer/registration','GuestController@volunteer_store');
