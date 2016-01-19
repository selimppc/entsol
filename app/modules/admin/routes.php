<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 3:59 PM
 */

Route::group(array('modules'=>'Admin', 'namespace' => 'App\Modules\Admin\Controllers'), function() {
    //Your routes belong to this module.

Route::any('examples', [
'as' => 'examples',
'uses' => 'AdminController@examples_pages'
]);

Route::any('admin', [
    'as' => 'admin',
    'uses' => 'AdminController@index'
]);

    Route::any('/', [
        'as' => 'dashboard',
        'uses' => 'AdminController@dashboard'
    ]);
    Route::any('index', [
        'as' => 'index',
        'uses' => 'AdminController@index'
    ]);

    /*Route::any('test', [
        'as' => 'test',
        'uses' => 'AdminController@test'
    ]);*/

});

