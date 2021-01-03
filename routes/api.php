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
Route::get('/admin/{id}', 'UserController@getAdminData');
Route::get('/admin', 'UserController@getAdmin');

Route::put('/admin/{id}', 'UserController@updateAdmin');

Route::put('/user/{id}', 'UserController@update');
Route::put('/userName/{id}', 'UserController@updateName');
Route::put('/user/{id}/role', 'UserController@updateRole');


Route::get('/user/{id}', 'UserController@show');
Route::delete('/user/{id}', 'UserController@destroy');

Route::post('/event', 'EventController@create');
Route::get('/event', 'EventController@index');
Route::put('/user/{Userid}/event/{Eventid}', 'EventController@update');
Route::get('/user/{id}/event', 'EventController@userEvent');
Route::delete('/event/{id}', 'EventController@destroy');
Route::get('/todayEvent', 'EventController@todayEvent');
Route::get('/incomingEvent', 'EventController@incomingEvent');


Route::post('/request', 'RequestController@create');
Route::get('/request', 'RequestController@index');
Route::get('/user/{id}/request', 'RequestController@AcceptedRequest');
Route::get('/user/{id}/totalRequest', 'RequestController@userRequest');
Route::delete('/request/{id}', 'RequestController@destroy');
Route::put('/request/donor', 'RequestController@saveDonor');
Route::get('/{bloodType}/findDonor', 'RequestController@findDonor');

Route::get('/leaderBoard', 'RequestController@leaderboard');

Route::post('/confirmDonationNotification', 'NotificationController@confirmDonationNotification');
Route::post('/notification', 'NotificationController@sendNotification');
Route::post('/requestNotification', 'NotificationController@requestNotification');
Route::get('/notification', 'NotificationController@sendNotification');
Route::put('/user/{id}/notification', 'NotificationController@update');

Route::post('/userNotification', 'UserNotificationController@store');
Route::get('/user/{id}/notification', 'UserNotificationController@show');
Route::put('/notification/{id}', 'UserNotificationController@update');

Route::post('/message', 'MessageController@store');
Route::get('/message', 'MessageController@index');
Route::put('/message', 'MessageController@update');
Route::get('/message/{userId}/unread/{conversationId}', 'MessageController@unread');
Route::get('/conversationMessage/{user1}/{user2}', 'MessageController@conversationMessage');
Route::get('/latestMessage/{id}', 'MessageController@latestMessage');

Route::post('/conversation', 'ConversationController@store');
Route::get('/conversation/{id}', 'ConversationController@index');

Route::post('/{id}/qualification', 'QualificationController@store');
Route::get('/{id}/qualification', 'QualificationController@show');
Route::put('/{id}/qualification', 'QualificationController@update');
Route::get('/{id}/qualification', 'QualificationController@latestDonation');


Route::get('/achievement', 'AchievementController@index');
Route::get('/achievement/{id}', 'AchievementController@show');
Route::post('/achievement/{id}', 'AchievementController@store');
Route::put('/achievement/{id}', 'AchievementController@update');
Route::delete('/achievement/{id}', 'AchievementController@destroy');


Route::post('/userAchievement/{id}', 'UserAchievementController@store');
Route::get('/userAchievement/{id}', 'UserAchievementController@show');

Route::get('/{id}/lifeSaved', 'RequestController@lifeSaved');
