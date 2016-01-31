<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:23 PM
 */

//Voucher Head .......
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

Route::any('status-voucher-head/{id}', [
    'as' => 'status-voucher-head',
    'uses' => 'VoucherHeadController@change_status'
]);


//Voucher Head Detail.......

Route::any('voucher-detail/{id}', [
    'as' => 'voucher-detail',
    'uses' => 'VoucherDetailController@index'
]);

Route::any('store-voucher-detail', [
    'as' => 'store-voucher-detail',
    'uses' => 'VoucherDetailController@store'
]);

Route::any('view-voucher-detail/{id}', [
    'as' => 'view-voucher-detail',
    'uses' => 'VoucherDetailController@show'
]);
Route::any('edit-voucher-detail/{id}', [
    'as' => 'edit-voucher-detail',
    'uses' => 'VoucherDetailController@edit'
]);
Route::any('update-voucher-detail/{id}', [
    'as' => 'update-voucher-detail',
    'uses' => 'VoucherDetailController@update'
]);

Route::any('delete-voucher-detail/{id}', [
    'as' => 'delete-voucher-detail',
    'uses' => 'VoucherDetailController@delete'
]);

Route::any('status-voucher-detail/{id}', [
    'as' => 'status-voucher-detail',
    'uses' => 'VoucherDetailController@change_status'
]);

Route::any('search', [
    'as' => 'search',
    'uses' => 'VoucherDetailController@search'
]);

Route::any('search/autocomplete', [
    'as' => 'search-autocomplete',
    'uses' => 'VoucherDetailController@autocomplete'
]);

