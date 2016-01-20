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

Route::any('sign-up', [
    'as' => 'sign-up',
    'uses' => 'UserController@create_sign_up'
]);

Route::any('sign-in', [
    'as' => 'sign-in',
    'uses' => 'UserController@create_sign_in'
]);

Route::any('user-profile', [
    'as' => 'user-profile',
    'uses' => 'UserController@create_profile'
]);
});

