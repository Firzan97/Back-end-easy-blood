<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'UserController@login');
Route::post('/user', 'UserController@create');
Route::get('/user', 'UserController@index');
Route::put('/user/{id}', 'UserController@update');
Route::get('/user/{id}', 'UserController@show');
Route::post('/event', 'EventController@create');
Route::get('/event', 'EventController@index');
Route::get('user/{id}/event', 'EventController@userEvent');
Route::post('/request', 'RequestController@create');
Route::get('/request', 'RequestController@index');
Route::get('user/{id}/request', 'RequestController@userRequest');
Route::get('/findDonor', 'RequestController@findDonor');
Route::delete('/event/{id}', 'EventController@destroy');
Route::delete('/user/{id}', 'UserController@destroy');
Route::delete('/request/{id}', 'RequestController@destroy');
Route::post('/notification', 'NotificationController@sendNotification');
Route::get('/notification', 'NotificationController@sendNotification');
Route::put('/user/{id}/notification', 'NotificationController@update');
Route::post('/userNotification', 'UserNotificationController@store');
Route::get('/user/{id}/notification', 'UserNotificationController@show');
Route::put('/notification/{id}', 'UserNotificationController@update');
