<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Api\V1\Auth'], function () {

    Route::post('/register', 'AuthController@postRegister');
    Route::post('/login', 'AuthController@postLogin');

    Route::get('/user', 'AuthController@getUser');
    Route::get('/token/validate', 'AuthController@validateToken');

});
