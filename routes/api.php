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
Route::post('/event', 'EventController@create');
Route::get('/event', 'EventController@index');
Route::post('/request', 'EventRequest@create');
Route::get('/request', 'EventRequest@index');
