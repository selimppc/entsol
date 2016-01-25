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

    /**Group One**/

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

    /**Default Offset**/

    Route::any("default_offset/index", [
        "as"   => "default_offset-index",
        "uses" => "DefaultOffsetController@index"
    ]);

    Route::any("default_offset/store", [
        "as"   => "default_offset-store",
        "uses" => "DefaultOffsetController@store"
    ]);

    Route::any("default_offset/show/{id}", [
        "as"   => "default_offset-show",
        "uses" => "DefaultOffsetController@show"
    ]);

    Route::any("default_offset/edit/{id}", [
        "as"   => "default_offset-edit",
        "uses" => "DefaultOffsetController@edit"
    ]);

    Route::any("default_offset/update/{id}", [
        "as"   => "default_offset-update",
        "uses" => "DefaultOffsetController@update"
    ]);

    Route::any("default_offset/delete/{id}", [
        "as"   => "default_offset-delete",
        "uses" => "DefaultOffsetController@delete"
    ]);


    /**Currency**/

    Route::any("currency/index", [
        "as"   => "currency-index",
        "uses" => "CurrencyController@index"
    ]);

    Route::any("currency/store", [
        "as"   => "currency-store",
        "uses" => "CurrencyController@store"
    ]);

    Route::any("currency/show/{id}", [
        "as"   => "currency-show",
        "uses" => "CurrencyController@show"
    ]);

    Route::any("currency/edit/{id}", [
        "as"   => "currency-edit",
        "uses" => "CurrencyController@edit"
    ]);

    Route::any("currency/update/{id}", [
        "as"   => "currency-update",
        "uses" => "CurrencyController@update"
    ]);

    Route::any("currency/delete/{id}", [
        "as"   => "currency-delete",
        "uses" => "CurrencyController@delete"
    ]);


});

