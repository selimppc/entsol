<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/27/16
 * Time: 12:11 PM
 */

Route::group(array('modules'=>'Inventory', 'namespace' => 'App\Modules\Inventory\Controllers'), function() {
    //Your routes belong to this module.


    Route::get('inventory', function () {
        return 'Hello World inventory';
    });

});