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
    'uses' => 'PermissionController@store'
]);

Route::any('view-permission/{route_url} ', [
    'as' => 'view-permission',
    'uses' => 'PermissionController@show'
]);

Route::any('edit-permission/{route_url} ', [
    'as' => 'edit-permission',
    'uses' => 'PermissionController@edit'
]);

Route::any('update-permission/{route_url} ', [
    'as' => 'update-permission',
    'uses' => 'PermissionController@update'
]);

Route::any('delete-permission/{route_url} ', [
    'as' => 'delete-permission',
    'uses' => 'PermissionController@destroy'
]);


Route::any('route-in-permission', [
    'as' => 'route-in-permission',
    'uses' => 'PermissionController@route_in_permission'
]);

//permission role route---------------------
Route::any('index-permission-role', [
    'as' => 'index-permission-role',
    'uses' => 'PermissionRoleController@index'
]);

Route::any('store-permission-role', [
    'as' => 'store-permission-role',
    'uses' => 'PermissionRoleController@store'
]);

Route::any('view-permission-role/{id}', [
    'as' => 'view-permission-role',
    'uses' => 'PermissionRoleController@show'
]);

Route::any('edit-permission-role/{id}', [
    'as' => 'edit-permission-role',
    'uses' => 'PermissionRoleController@edit'
]);

Route::any('update-permission-role/{id}', [
    'as' => 'update-permission-role',
    'uses' => 'PermissionRoleController@update'
]);

Route::any('delete-permission-role/{id}', [
    'as' => 'delete-permission-role',
    'uses' => 'PermissionRoleController@destroy'
]);
