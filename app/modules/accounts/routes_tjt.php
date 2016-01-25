<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:23 PM
 */


Route::any('voucher-head', [
    'as' => 'voucher-head',
    'uses' => 'VoucherHeadController@index'
]);
