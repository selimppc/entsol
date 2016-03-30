<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/29/16
 * Time: 1:59 PM
 */

/*........buyer..........*/

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


/*........yarn_count..........*/

Route::any('yarn-count', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'yarn-count',
    'uses' => 'YarnCountController@index'
]);

Route::any('store-yarn-count', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-yarn-count',
    'uses' => 'YarnCountController@store'
]);

Route::any('view-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-yarn-count',
    'uses' => 'YarnCountController@show'
]);

Route::any('edit-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-yarn-count',
    'uses' => 'YarnCountController@edit'
]);

Route::any('update-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-yarn-count',
    'uses' => 'YarnCountController@update'
]);

Route::any('delete-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-yarn-count',
    'uses' => 'YarnCountController@delete'

]);

/*........yarn_composition..........*/

Route::any('yarn-composition', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'yarn-composition',
    'uses' => 'YarnCompositionController@index'
]);

Route::any('store-yarn-composition', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-yarn-composition',
    'uses' => 'YarnCompositionController@store'
]);

Route::any('view-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-yarn-composition',
    'uses' => 'YarnCompositionController@show'
]);

Route::any('edit-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-yarn-composition',
    'uses' => 'YarnCompositionController@edit'
]);

Route::any('update-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-yarn-composition',
    'uses' => 'YarnCompositionController@update'
]);

Route::any('delete-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-yarn-composition',
    'uses' => 'YarnCompositionController@delete'

]);
