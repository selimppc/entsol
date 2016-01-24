<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('modules'=>'Accounts', 'namespace' => 'App\Modules\Accounts\Controllers'), function() {
    //Your routes belong to this module.

    Route::get('accounts', function () {
        return 'Welcome In Accounts Module';
    });

    Route::any("group_one/index", [
        "as"   => "group_one-index",
        "uses" => "GroupOneController@index"
    ]);

    Route::any("group_one/store", [
        "as"   => "group_one-store",
        "uses" => "GroupOneController@store"
    ]);

    Route::any("group_one/show/{id}", [
        "as"   => "group_one-show",
        "uses" => "GroupOneController@show"
    ]);

    Route::any("group_one/edit/{id}", [
        "as"   => "group_one-edit",
        "uses" => "GroupOneController@edit"
    ]);

    Route::any("group_one/update/{id}", [
        "as"   => "group_one-update",
        "uses" => "GroupOneController@update"
    ]);

    Route::any("group_one/delete/{id}", [
        "as"   => "group_one-delete",
        "uses" => "GroupOneController@delete"
    ]);


});

