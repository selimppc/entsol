<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('modules'=>'User', 'namespace' => 'App\Modules\User\Controllers'), function() {
    //Your routes belong to this module.
include 'routes_permission.php';
Route::any('index-user', [
    'as' => 'index-user',
    'uses' => 'UserController@index'
]);

Route::any('add-user', [
    'as' => 'add-user',
    'uses' => 'UserController@add_user'
]);

Route::any('show-user/{id}', [
    'as' => 'show-user',
    'uses' => 'UserController@show_user'
]);

Route::any('edit-user', [
    'as' => 'edit-user',
    'uses' => 'UserController@edit_user'
]);

Route::any('update-user', [
    'as' => 'update-user',
    'uses' => 'UserController@update_user'
]);

Route::any('delete-user', [
    'as' => 'delete-user',
    'uses' => 'UserController@destroy_user'
]);

Route::any('user', [
    'as' => 'user',
    'uses' => 'UserController@index'
]);

Route::any('create-sign-up', [
    'as' => 'create-sign-up',
    'uses' => 'UserController@create_sign_up'
]);

Route::any('forget-password-view', [
    'as' => 'forget-password-view',
    'uses' => 'UserController@forget_password_view'
]);

Route::any('forget-password', [
    'as' => 'forget-password',
    'uses' => 'UserController@forget_password'
]);

Route::any('password-reset-confirm/{reset_password_token}', [
    'as' => 'password-reset-confirm',
    'uses' => 'UserController@password_reset_confirm'
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

Route::any('add-user', [
    'as' => 'add-user',
    'uses' => 'UserController@add_user'
]);
});




