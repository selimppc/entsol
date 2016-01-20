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
    'uses' => 'UserController@signup'
]);

Route::any('create-sign-in', [
    'as' => 'create-sign-in',
    'uses' => 'UserController@create_sign_in'
]);

Route::any('signin', [
    'as' => 'signin',
    'uses' => 'UserController@signin'
]);

Route::any('user-profile', [
    'as' => 'user-profile',
    'uses' => 'UserController@create_profile'
]);
});

