<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:23 PM
 */

//Voucher Head .......
Route::any('test', [
    'as' => 'test',
    'uses' => 'VoucherDetailController@test'
]);

Route::any('coa-list', [
    'as' => 'coa-list',
    'uses' => 'VoucherDetailController@get_autocomplete_search_coa'
]);

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

Route::any('voucher-detail/{id}/{voucher_number}', [
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

Route::any('destroy-voucher-detail/{id}', [
    'as' => 'destroy-voucher-detail',
    'uses' => 'VoucherDetailController@destroy'
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
Route::any('search/autocomplete', [
    'as' => 'search-autocomplete',
    'uses' => 'VoucherDetailController@autocomplete'
]);

Route::any('journal-post/{voucher_number}', [
    'as' => 'journal-post',
    'uses' => 'VoucherDetailController@journal_post'
]);

Route::any('ajax-account-code', [
    'as' => 'ajax-account-code',
    'uses' => 'VoucherDetailController@get_ajax_ac'
]);

Route::any('exchange-rate', [
    'as' => 'exchange-rate',
    'uses' => 'VoucherDetailController@get_ajax_exchange_rate'
]);


/*
 * TODO :: search voucher
 * */

Route::get('search-voucher', [
    'as' => 'search-voucher',
    'uses' => 'VoucherHeadController@search_voucher'
]);


Route::get('search-voucher-details/{id}/{voucher_number}', [
    'as' => 'search-voucher-details',
    'uses' => 'VoucherDetailController@search_voucher_details'
]);


/*------------------------------Reverse Voucher--------------------------*/

Route::any('reverse-voucher', [
    'as' => 'reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@index'
]);

Route::any('store-reverse-voucher', [
    'as' => 'store-reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@store'
]);

Route::any('view-reverse-voucher/{id}', [
    'as' => 'view-reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@show'
]);
Route::any('edit-reverse-voucher/{id}', [
    'as' => 'edit-reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@edit'
]);
Route::any('update-reverse-voucher/{id}', [
    'as' => 'update-reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@update'
]);

Route::any('delete-reverse-voucher/{id}', [
    'as' => 'delete-reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@delete'
]);

Route::any('status-reverse-voucher/{id}', [
    'as' => 'status-reverse-voucher',
    'uses' => 'ReverseVoucherHeadController@change_status'
]);




