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

    /*Route::get('routes', function() {
        \Artisan::call('route:list');
        return \Artisan::output();
    });*/
    /*Route::get('routes', function() {
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            echo $value->getPath() .'<br>';
        }
    });*/
Route::any('user-list', [
'as' => 'user-list',
'uses' => 'UserController@index'
]);

Route::any('add-user', [
    'as' => 'add-user',
    'uses' => 'UserController@add_user'
]);

Route::any('search-user', [
    'as' => 'search-user',
    'uses' => 'UserController@search_user'
]);

Route::any('show-user/{id}', [
    'as' => 'show-user',
    'uses' => 'UserController@show_user'
]);

Route::any('edit-user/{id}', [
    'as' => 'edit-user',
    'uses' => 'UserController@edit_user'
]);

Route::any('update-user/{id}', [
    'as' => 'update-user',
    'uses' => 'UserController@update_user'
]);

Route::any('delete-user/{id}', [
    'as' => 'delete-user',
    'uses' => 'UserController@destroy_user'
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

Route::any('user-save-new-password',
    ['as'=>'user-save-new-password',
        'uses'=>'UserController@save_new_password']);

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

/*Role */

Route::any('role', [
    'as' => 'role',
    'uses' => 'RoleController@index'
]);

Route::any('store-role', [
    'as' => 'store-role',
    'uses' => 'RoleController@store_role'
]);

Route::any('view-role/{slug}', [
    'as' => 'view-role',
    'uses' => 'RoleController@show'
]);

Route::any('edit-role/{slug}', [
    'as' => 'edit-role',
    'uses' => 'RoleController@edit'
]);

Route::any('update-role/{slug}', [
    'as' => 'update-role',
    'uses' => 'RoleController@update'
]);

Route::any('delete-role/{slug}', [
    'as' => 'delete-role',
    'uses' => 'RoleController@destroy'
]);

    /*Role User*/

    Route::any('index-role-user', [
        'as' => 'index-role-user',
        'uses' => 'RoleUserController@index'
    ]);

    Route::any('store-role-user', [
        'as' => 'store-role-user',
        'uses' => 'RoleUserController@store'
    ]);

    Route::any('view-role-user/{id}', [
        'as' => 'view-role-user',
        'uses' => 'RoleUserController@show'
    ]);

    Route::any('edit-role-user/{id}', [
        'as' => 'edit-role-user',
        'uses' => 'RoleUserController@edit'
    ]);

    Route::any('update-role-user/{id}', [
        'as' => 'update-role-user',
        'uses' => 'RoleUserController@update'
    ]);

    Route::any('delete-role-user/{id}', [
        'as' => 'delete-role-user',
        'uses' => 'RoleUserController@destroy'
    ]);
});




