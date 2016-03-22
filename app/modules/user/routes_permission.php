<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */
Route::any('index-permission', [
    'middleware' => 'acl_access:user/index-permission',
    'as' => 'index-permission',
    'uses' => 'PermissionController@index'
]);

Route::any('ajax-permission-role', [
    'middleware' => 'acl_access:user/ajax-permission-role',
    'as' => 'ajax-permission-role',
    'uses' => 'PermissionRoleController@ajax_permission_role'
]);

Route::any('store-permission', [
    'middleware' => 'acl_access:user/store-permission',
    'as' => 'store-permission',
    'uses' => 'PermissionController@store'
]);

Route::any('view-permission/{id}', [
    'middleware' => 'acl_access:user/view-permission/{id}',
    'as' => 'view-permission',
    'uses' => 'PermissionController@show'
]);

Route::any('edit-permission/{id}', [
    'middleware' => 'acl_access:user/edit-permission/{id}',
    'as' => 'edit-permission',
    'uses' => 'PermissionController@edit'
]);

Route::any('update-permission/{id}', [
    'middleware' => 'acl_access:user/update-permission/{id}',
    'as' => 'update-permission',
    'uses' => 'PermissionController@update'
]);

Route::any('delete-permission/{id}', [
    'middleware' => 'acl_access:user/delete-permission/{id}',
    'as' => 'delete-permission',
    'uses' => 'PermissionController@destroy'
]);


Route::any('route-in-permission', [
    'middleware' => 'acl_access:user/route-in-permission',
    'as' => 'route-in-permission',
    'uses' => 'PermissionController@route_in_permission'
]);

//permission role route---------------------
Route::any('index-permission-role', [
    'middleware' => 'acl_access:user/index-permission-role',
    'as' => 'index-permission-role',
    'uses' => 'PermissionRoleController@index'
]);

Route::any('store-permission-role', [
    'middleware' => 'acl_access:user/store-permission-role',
    'as' => 'store-permission-role',
    'uses' => 'PermissionRoleController@store'
]);

Route::any('view-permission-role/{id}', [
    'middleware' => 'acl_access:user/view-permission-role/{id}',
    'as' => 'view-permission-role',
    'uses' => 'PermissionRoleController@show'
]);

Route::any('edit-permission-role/{id}', [
    'middleware' => 'acl_access:user/edit-permission-role/{id}',
    'as' => 'edit-permission-role',
    'uses' => 'PermissionRoleController@edit'
]);

Route::any('update-permission-role/{id}', [
    'middleware' => 'acl_access:user/update-permission-role/{id}',
    'as' => 'update-permission-role',
    'uses' => 'PermissionRoleController@update'
]);

Route::any('delete-permission-role/{id}', [
    'middleware' => 'acl_access:user/delete-permission-role/{id}',
    'as' => 'delete-permission-role',
    'uses' => 'PermissionRoleController@destroy'
]);

Route::get('search-permission-role', [
    'middleware' => 'acl_access:user/search-permission-role',
    'as' => 'search-permission-role',
    'uses' => 'PermissionRoleController@search_permission_role'
]);

Route::any('module-based-routes', [
    //'middleware' => 'acl_access:user/index-permission',
    'as' => 'module-based-routes',
    'uses' => 'PermissionRoleController@module_based_routes'
]);

Route::any('get-role', [
    'middleware' => 'acl_access:user/get-role',
    'as' => 'get-role',
    'uses' => 'PermissionRoleController@get_role'
]);
Route::any('get-permission/{role_id}', [
    'middleware' => 'acl_access:user/get-permission',
    'as' => 'get-permission',
    'uses' => 'PermissionRoleController@get_permission'
]);

Route::any('post-permission', [
    'middleware' => 'acl_access:user/post-permission',
    'as' => 'post-permission',
    'uses' => 'PermissionRoleController@post_permission'
]);
