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
    return view('welcome');
});


Route::any('create-sign-in', [
    'as' => 'create-sign-in',
    'uses' => 'Auth\AuthController@create_sign_in'
]);

Route::any('login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@login'
]);

Route::any('example/login', [
    'as' => 'example.login',
    'uses' => 'Auth\AuthController@getLogin'
]);