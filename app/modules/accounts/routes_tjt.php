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

Route::any('voucher-head-store', [
    'as' => 'voucher-head-store',
    'uses' => 'VoucherHeadController@store'
]);

Route::any('view-voucher-head/{id}', [
    'as' => 'view-voucher-head',
    'uses' => 'VoucherHeadController@show'
]);
Route::any('edit-voucher-head/{id}', [
    'as' => 'edit-voucher-head',
    'uses' => 'VoucherHeadController@edit'
]);
Route::any('update-voucher-head/{id}', [
    'as' => 'update-voucher-head',
    'uses' => 'VoucherHeadController@update'
]);

Route::any('delete-voucher-head/{id}', [
    'as' => 'delete-voucher-head',
    'uses' => 'VoucherHeadController@delete'
]);
