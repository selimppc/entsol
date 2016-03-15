<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 4:03 PM
 */


Route::any('recursive-menu', [
    //'middleware' => 'acl_access:user/user-list',
    'as' => 'recursive-menu',
    'uses' => 'TestController@recursive_menu'
]);