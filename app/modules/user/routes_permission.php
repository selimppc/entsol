<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */
Route::any('index-permission', [
    'as' => 'index-permission',
    'uses' => 'PermissionController@index'
]);

Route::any('store-permission', [
    'as' => 'store-permission',
    'uses' => 'PermissionController@add'
]);

Route::any('show-permission/{id}', [
    'as' => 'show-permission',
    'uses' => 'PermissionController@show'
]);

Route::any('edit-permission', [
    'as' => 'edit-permission',
    'uses' => 'PermissionController@edit'
]);

Route::any('update-permission', [
    'as' => 'update-permission',
    'uses' => 'PermissionController@update'
]);

Route::any('delete-permission', [
    'as' => 'delete-permission',
    'uses' => 'PermissionController@destroy'
]);
