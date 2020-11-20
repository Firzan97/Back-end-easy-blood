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
Route::resource('event', 'EventController');
Route::resource('request', 'RequestController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('job', 'JobController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/event', 'EventController@create');
Route::get('/event', 'EventController@index');
Route::put('/user/{Userid}/event/{Eventid}', 'EventController@update');
Route::get('/user/{id}/event', 'EventController@userEvent');
Route::delete('/event/{id}', 'EventController@destroy');
Route::get('/todayEvent', 'EventController@todayEvent');
Route::get('/incomingEvent', 'EventController@incomingEvent');

Route::post('/user', 'UserController@create');
Route::get('/user', 'UserController@index');
Route::put('/user/{id}', 'UserController@update');
Route::get('/user/{id}', 'UserController@show');
Route::delete('/user/{id}', 'UserController@destroy');
