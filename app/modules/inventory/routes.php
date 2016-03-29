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



});