<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 3:59 PM
 */

Route::group(array('middleware' => 'auth','modules'=>'Admin', 'namespace' => 'App\Modules\Admin\Controllers'), function() {
    //Your routes belong to this module.

/*Form Components*/
Route::get('form-elements', function () {
    return view('admin::layouts.example_pages.form_elements');
});

/* Form Sample For Registration*/
Route::get('reg-sample', function () {
    return view('admin::layouts.example_pages.reg_form');
});

Route::any('admin', [
    'as' => 'admin',
    'uses' => 'AdminController@index'
]);

Route::any('content-page', [
    'as' => 'content-page',
    'uses' => 'AdminController@content_page'
]);


Route::any('validation-page', [
    'as' => 'validation-page',
    'uses' => 'AdminController@validation_page'
]);

});

