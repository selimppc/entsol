<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('prefix' => 'user','modules'=>'User', 'namespace' => 'App\Modules\User\Controllers'), function() {
    //Your routes belong to this module.
include 'routes_permission.php';
include 'routes_test.php';

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
    'middleware' => 'acl_access:user/user-list',
    'as' => 'user-list',
    'uses' => 'UserController@index'
]);

Route::any('add-user', [
    'middleware' => 'acl_access:user/add-user',
    'as' => 'add-user',
    'uses' => 'UserController@add_user'
]);

Route::any('search-user', [
    'middleware' => 'acl_access:user/search-user',
    'as' => 'search-user',
    'uses' => 'UserController@search_user'
]);

Route::any('show-user/{id}', [
    'middleware' => 'acl_access:user/show-user/{id}',
    'as' => 'show-user',
    'uses' => 'UserController@show_user'
]);

Route::any('edit-user/{id}', [
    'middleware' => 'acl_access:user/edit-user/{id}',
    'as' => 'edit-user',
    'uses' => 'UserController@edit_user'
]);

Route::any('update-user/{id}', [
    'middleware' => 'acl_access:user/update-user/{id}',
    'as' => 'update-user',
    'uses' => 'UserController@update_user'
]);

Route::any('delete-user/{id}', [
    'middleware' => 'acl_access:user/delete-user/{id}',
    'as' => 'delete-user',
    'uses' => 'UserController@destroy_user'
]);


Route::any('create-sign-up', [
    //'middleware' => 'acl_access:user/create-sign-up',
    'as' => 'create-sign-up',
    'uses' => 'UserController@create_sign_up'
]);

Route::any('forget-password-view', [
    //'middleware' => 'acl_access:user/forget-password-view',
    'as' => 'forget-password-view',
    'uses' => 'UserController@forget_password_view'
]);

Route::any('forget-password', [
    //'middleware' => 'acl_access:user/forget-password-view',
    'as' => 'forget-password',
    'uses' => 'UserController@forget_password'
]);

Route::any('password-reset-confirm/{reset_password_token}', [
    //'middleware' => 'acl_access:user/password-reset-confirm/{reset_password_token}',
    'as' => 'password-reset-confirm',
    'uses' => 'UserController@password_reset_confirm'
]);

Route::any('user-save-new-password',[
    //'middleware' => 'acl_access:user/user-save-new-password',
        'as'=>'user-save-new-password',
        'uses'=>'UserController@save_new_password']);

Route::any('signup', [
    //'middleware' => 'acl_access:user/signup',
    'as' => 'signup',
    'uses' => 'UserController@store_signup_info'
]);

Route::get('user-logout', [
    //'middleware' => 'acl_access:user/user-logout',
    'as' => 'user-logout',
    'uses' => 'UserController@logout'
]);

Route::any('add-user', [
    'middleware' => 'acl_access:user/add-user',
    'as' => 'add-user',
    'uses' => 'UserController@add_user'
]);

/*Role */

Route::any('role', [
    'middleware' => 'acl_access:user/role',
    'as' => 'role',
    'uses' => 'RoleController@index'
]);

Route::any('store-role', [
    'middleware' => 'acl_access:user/store-role',
    'as' => 'store-role',
    'uses' => 'RoleController@store_role'
]);

Route::any('view-role/{slug}', [
    'middleware' => 'acl_access:user/view-role/{slug}',
    'as' => 'view-role',
    'uses' => 'RoleController@show'
]);

Route::any('edit-role/{slug}', [
    'middleware' => 'acl_access:user/edit-role/{slug}',
    'as' => 'edit-role',
    'uses' => 'RoleController@edit'
]);

Route::any('update-role/{slug}', [
    'middleware' => 'acl_access:user/update-role/{slug}',
    'as' => 'update-role',
    'uses' => 'RoleController@update'
]);

Route::any('delete-role/{slug}', [
    'middleware' => 'acl_access:user/delete-role/{slug}',
    'as' => 'delete-role',
    'uses' => 'RoleController@destroy'
]);

    /*Role User*/

    Route::any('index-role-user', [
        'middleware' => 'acl_access:user/index-role-user',
        'as' => 'index-role-user',
        'uses' => 'RoleUserController@index'
    ]);

    Route::any('search-role-user', [
        'middleware' => 'acl_access:user/search-role-user',
        'as' => 'search-role-user',
        'uses' => 'RoleUserController@search_role_user'
    ]);

    Route::any('store-role-user', [
        'middleware' => 'acl_access:user/store-role-user',
        'as' => 'store-role-user',
        'uses' => 'RoleUserController@store'
    ]);

    Route::any('view-role-user/{id}', [
        'middleware' => 'acl_access:user/view-role-user/{id}',
        'as' => 'view-role-user',
        'uses' => 'RoleUserController@show'
    ]);

    Route::any('edit-role-user/{id}', [
        'middleware' => 'acl_access:user/edit-role-user/{id}',
        'as' => 'edit-role-user',
        'uses' => 'RoleUserController@edit'
    ]);

    Route::any('update-role-user/{id}', [
        'middleware' => 'acl_access:user/update-role-user/{id}',
        'as' => 'update-role-user',
        'uses' => 'RoleUserController@update'
    ]);

    Route::any('delete-role-user/{id}', [
        'middleware' => 'acl_access:user/delete-role-user/{id}',
        'as' => 'delete-role-user',
        'uses' => 'RoleUserController@destroy'
    ]);

    Route::any('user-profile', [
        'middleware' => 'acl_access:user/user-profile',
        'as' => 'user-profile',
        'uses' => 'UserController@create_user_info'
    ]);

    Route::any('user-info/{value}', [
       'middleware' => 'acl_access:user/user-info/{value}',
        'as' => 'user-info',
        'uses' => 'UserController@user_info'
    ]);

    Route::any('inactive-user-dashboard', [
        'middleware' => 'acl_access:user/inactive-user-dashboard',
        'as' => 'inactive-user-dashboard',
        'uses' => 'UserController@inactive_user_dashboard'
    ]);

    Route::any('store-user-profile', [
        'middleware' => 'acl_access:user/store-user-profile',
        'as' => 'store-user-profile',
        'uses' => 'UserController@store_user_profile'
    ]);

    Route::any('edit-user-profile/{id}', [
        'middleware' => 'acl_access:user/edit-user-profile/{id}',
        'as' => 'edit-user-profile',
        'uses' => 'UserController@edit_user_profile'
    ]);

    Route::any('update-user-profile/{id}', [
        'middleware' => 'acl_access:user/update-user-profile/{id}',
        'as' => 'update-user-profile',
        'uses' => 'UserController@update_user_profile'
    ]);

    Route::any('store-meta-data', [
        'middleware' => 'acl_access:user/store-meta-data',
        'as' => 'store-meta-data',
        'uses' => 'UserController@store_meta_data'
    ]);

    Route::any('edit-meta-data/{id}', [
        'middleware' => 'acl_access:user/edit-meta-data/{id}',
        'as' => 'edit-meta-data',
        'uses' => 'UserController@edit_meta_data'
    ]);

    Route::any('update-meta-data/{id}', [
        'middleware' => 'acl_access:user/update-meta-data/{id}',
        'as' => 'update-meta-data',
        'uses' => 'UserController@update_meta_data'
    ]);


Route::any('change-password-view', [
    'middleware' => 'acl_access:user/change-password-view',
    'as' => 'change-password-view',
    'uses' => 'UserController@change_user_password_view'
]);

Route::any('update-password', [
    'middleware' => 'acl_access:user/update-password',
    'as' => 'update-password',
    'uses' => 'UserController@update_password'
]);

Route::any('store-profile-image', [
    'middleware' => 'acl_access:user/store-profile-image',
    'as' => 'store-profile-image',
    'uses' => 'UserController@store_profile_image'
]);

Route::any('edit-profile-image/{user_image_id}', [
    'middleware' => 'acl_access:user/edit-profile-image/{user_image_id}',
    'as' => 'edit-profile-image',
    'uses' => 'UserController@edit_profile_image'
]);
Route::any('update-profile-image/{user_image_id}', [
    'middleware' => 'acl_access:user/update-profile-image/{user_image_id}',
    'as' => 'update-profile-image',
    'uses' => 'UserController@update_profile_image'
]);

Route::any('user-login-history', [
    'middleware' => 'acl_access:user/user-login-history',
    'as' => 'user-login-history',
    'uses' => 'UserActivityHistory@login_history'
]);

Route::any('search-user-history', [
    'middleware' => 'acl_access:user/search-user-history',
    'as' => 'search-user-history',
    'uses' => 'UserActivityHistory@search_user_history'
]);

});
