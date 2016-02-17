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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::any('inactive-user', [
    'as' => 'inactive-user',
    'uses' => 'UserController@postLogin'
]);

Route::any('post-user-login', [
    'as' => 'post-user-login',
    'uses' => 'Auth\AuthController@postLogin'
]);


Route::group(['middleware' => 'auth'], function()
{

Route::any('/', [
    'as' => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);

Route::any('dashboard', [
    'as' => 'dashboard',
    'uses' => 'HomeController@dashboard'
]);

    Route::any('all_routes_uri', [
        'as' => 'all_routes_uri',
        'uses' => 'HomeController@all_routes_uri'
    ]);

});

