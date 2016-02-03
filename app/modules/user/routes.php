<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('modules'=>'User', 'namespace' => 'App\Modules\User\Controllers'), function() {
    //Your routes belong to this module.


Route::any('user', [
    'as' => 'user',
    'uses' => 'UserController@index'
]);

Route::any('create-sign-up', [
    'as' => 'create-sign-up',
    'uses' => 'UserController@create_sign_up'
]);

Route::any('signup', [
    'as' => 'signup',
    'uses' => 'UserController@store_signup_info'
]);

Route::get('get-user-login', [
    'as' => 'get-user-login',
    'uses' => 'UserController@getLogin'
]);

Route::any('user-profile', [
    'as' => 'user-profile',
    'uses' => 'UserController@create_profile'
]);

Route::get('user-logout', [
    'as' => 'user-logout',
    'uses' => 'UserController@logout'
]);

});




