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

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');
Route::get('/auth/logout','Auth\AuthController@getLogout');


Route::group(["middleware" => 'auth'], function ()
{
	Route::get('/home','HomeController@dashboard');
	Route::get('/mention/ignore/{tweet_id}','MentionController@ignore');
	Route::get('/mention/reply/{tweet_id}','MentionController@replyGet');
	Route::post('/mention/reply','MentionController@replyPost');
	Route::get('/mention/convert/{tweet_id}','MentionController@convert');
	Route::post('/mention/convert/{tweet_id}','MentionController@convertPost');

	Route::get('/ticket/{ticket_id}','TicketController@index');
	Route::post('/ticket/{ticket_id}/{message_id}/reply','TicketController@reply');
	Route::get('/ticket/{ticket_id}/close','TicketController@close');
});