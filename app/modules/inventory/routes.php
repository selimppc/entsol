<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/27/16
 * Time: 12:11 PM
 */

Route::group(array('middleware' => 'auth','modules'=>'Inventory', 'namespace' => 'App\Modules\Inventory\Controllers'), function() {
    //Your routes belong to this module.

    @include('routes_inv.php');

    Route::get('inventory-test', function () {
        return 'Hello World:: Inventory';
    });

    /**Product Catagory**/

    Route::get('product-catagory', [
            //'middleware' => 'acl_access:product-catagory',
            'as' => 'product-catagory',
            'uses' => 'ProductCategoryController@index'
    ]);

    /*Route::any("store-group-one", [
            "middleware" => "acl_access:store-group-one",
            "as"   => "store-group-one",
            "uses" => "GroupOneController@store"
    ]);

    Route::any("view-group-one/{id}", [
            "middleware" => "acl_access:view-group-one/{id}",
            "as"   => "view-group-one",
            "uses" => "GroupOneController@show"
    ]);

    Route::any("edit-group-one/{id}", [
            "middleware" => "acl_access:edit-group-one/{id}",
            "as"   => "edit-group-one",
            "uses" => "GroupOneController@edit"
    ]);

    Route::any("update-group-one/{id}", [
            "middleware" => "acl_access:update-group-one/{id}",
            "as"   => "update-group-one",
            "uses" => "GroupOneController@update"
    ]);

    Route::any("delete-group-one/delete/{id}", [
            "middleware" => "acl_access:delete-group-one/delete/{id}",
            "as"   => "delete-group-one",
            "uses" => "GroupOneController@delete"
    ]);*/



});