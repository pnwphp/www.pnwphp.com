<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('index', 'HomeController@index');
Route::get('contact', 'HomeController@contact');
Route::get('community', 'HomeController@community');

Route::get('speakers', 'EventController@speakers');
Route::get('schedule', 'EventController@schedule');
Route::get('venue', 'EventController@venue');
Route::get('hotel', 'EventController@hotel');

Route::group(
    ['prefix' => 'admin/', 'middleware' => ['auth', 'auth.admin'] ], function () {
    Route::get('index', 'AdminController@index');
});

Route::group(
    ['prefix' => 'sponsor/' ], function () {
    Route::get('index', 'SponsorController@index');
});

Route::group(
    ['prefix' => 'guide/' ], function () {
    Route::get('index', 'GuideController@index');
});

Route::group(
    ['prefix' => 'archive/' ], function () {
    Route::get('index', 'ArchiveController@index');
});

// Registration should not currently be available
// Include Auth routes only as needed for generated admin accounts
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(
    ['prefix' => 'password/' ], function () {
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('reset', 'Auth\ResetPasswordController@reset');
});
