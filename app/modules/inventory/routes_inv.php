<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/29/16
 * Time: 1:59 PM
 */

Route::any('buyer', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'buyer',
    'uses' => 'BuyerController@index'
]);

Route::any('store-buyer', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-buyer',
    'uses' => 'BuyerController@store'
]);

Route::any('view-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-buyer',
    'uses' => 'BuyerController@show'
]);

Route::any('edit-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-buyer',
    'uses' => 'BuyerController@edit'
]);

Route::any('update-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-buyer',
    'uses' => 'BuyerController@update'
]);

Route::any('delete-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-buyer',
    'uses' => 'BuyerController@delete'

]);