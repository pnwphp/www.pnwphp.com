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
Route::get('contact/{subject?}', 'HomeController@getContact');
Route::post('contact', 'HomeController@postContact');
Route::get('home', 'HomeController@home');

Route::get('schedule', 'EventController@schedule');
Route::get('venue', 'EventController@venue');
Route::get('venue/album', 'EventController@venueAlbum');
Route::get('venue/getting-here', 'EventController@gettingHere');
Route::get('hotel', 'EventController@hotel');
Route::get('coc', 'EventController@coc');

Route::group(
    ['prefix' => 'friends/' ], function () {
    Route::get('', 'FriendsController@index');
    Route::get('index', 'FriendsController@index');
});

Route::group(
    ['prefix' => 'archive/' ], function () {
    Route::get('index', 'ArchiveController@index');
});

Route::group(
    ['prefix' => 'speakers/'], function () {
    Route::get('', 'SpeakerController@index');
    Route::get('index', 'SpeakerController@index');
    Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'auth.admin:speaker'] ], function ()
    {
        Route::get('', 'SpeakerController@getEditSpeaker');
        Route::post('', 'SpeakerController@postEditSpeaker');
    });
});

Route::group(
    ['prefix' => 'sponsors/' ], function () {
    Route::get('index', 'SponsorController@index');
    Route::get('', 'SponsorController@index');
    Route::get('new', 'SponsorController@getNewSponsorForm')->name('get_sponsor_form');
    Route::post('submit', 'SponsorController@postNewSponsorForm')->name('post_sponsor_form');
    Route::group(
        ['prefix' => 'admin/', 'middleware' => ['auth', 'auth.admin:sponsor'] ], function () {
        Route::get('{sponsorID?}', 'SponsorController@getEditSponsor');
        Route::post('{sponsorID}', 'SponsorController@postEditSponsor');
    });
});

// Registration should not currently be available
// Include Auth routes only as needed for generated admin, speaker, and sponsor accounts
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('logout', 'Auth\LoginController@logout');
Route::group(
    ['prefix' => 'password/' ], function () {
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('reset', 'Auth\ResetPasswordController@reset');
});

Route::group(
    ['prefix' => 'admin/', 'middleware' => ['auth', 'auth.admin'] ], function () {
    Route::get('index', 'AdminController@index');
    Route::get('', 'AdminController@index');

    Route::get('speaker', 'AdminController@newSpeaker');
    Route::get('speaker/{id}', 'AdminController@getSpeaker');
    Route::post('speaker', 'AdminController@postSpeaker');
    Route::post('speaker/add_user', 'AdminController@addUserToSpeaker');
    Route::post('speaker/remove_user', 'AdminController@removeUserFromSpeaker');
    Route::post('speaker/delete', 'AdminController@deleteSpeaker');

    Route::get('talk', 'AdminController@newTalk');
    Route::get('talk/{id}', 'AdminController@getTalk');
    Route::post('talk', 'AdminController@postTalk');
    Route::post('talk/add_speaker', 'AdminController@addSpeakerToTalk');
    Route::post('talk/remove_speaker', 'AdminController@removeSpeakerFromTalk');
    Route::post('talk/delete', 'AdminController@deleteTalk');

    Route::get('sponsor', 'AdminController@newSponsor');
    Route::get('sponsor/{id}', 'AdminController@getSponsor');
    Route::post('sponsor', 'AdminController@postSponsor');
    Route::post('sponsor/add_user', 'AdminController@addUserToSponsor');
    Route::post('sponsor/remove_user', 'AdminController@removeUserFromSponsor');
    Route::post('sponsor/delete', 'AdminController@deleteSponsor');

    Route::get('event', 'AdminController@newEvent');
    Route::get('event/{id}', 'AdminController@getEvent');
    Route::post('event', 'AdminController@postEvent');
    Route::post('event/delete', 'AdminController@deleteEvent');
});

Route::group(
	['prefix' => 'api/'], function () {
	Route::get('', 'ApiController@index');
	Route::get('schedule', 'ApiController@schedule');
	Route::get('speakers', 'ApiController@speakers');
	Route::get('sponsors', 'ApiController@sponsors');
});
