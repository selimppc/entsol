<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 1:07 PM
 */
Route::group(array('prefix' => 'journal'), function() {

//Voucher Head .......

Route::any('test-case', [
    'middleware' => 'acl_access:journal/test-case',
    'as' => 'test-case',
    'uses' => 'TestCaseController@test_case'
]);

Route::any('test', [
    'middleware' => 'acl_access:journal/test',
    'as' => 'test',
    'uses' => 'VoucherDetailController@test'
]);

Route::any('coa-list', [
    'middleware' => 'acl_access:journal/coa-list',
    'as' => 'coa-list',
    'uses' => 'VoucherDetailController@get_autocomplete_search_coa'
]);

Route::any('voucher-head', [
    'middleware' => 'acl_access:journal/voucher-head',
    'as' => 'voucher-head',
    'uses' => 'VoucherHeadController@index'
]);

Route::any('voucher-head-store', [
    'middleware' => 'acl_access:journal/voucher-head-store',
    'as' => 'voucher-head-store',
    'uses' => 'VoucherHeadController@store'
]);

Route::any('view-voucher-head/{id}', [
    'middleware' => 'acl_access:journal/view-voucher-head/{id}',
    'as' => 'view-voucher-head',
    'uses' => 'VoucherHeadController@show'
]);
Route::any('edit-voucher-head/{id}', [
    'middleware' => 'acl_access:journal/edit-voucher-head/{id}',
    'as' => 'edit-voucher-head',
    'uses' => 'VoucherHeadController@edit'
]);
Route::any('update-voucher-head/{id}', [
    'middleware' => 'acl_access:journal/update-voucher-head/{id}',
    'as' => 'update-voucher-head',
    'uses' => 'VoucherHeadController@update'
]);

Route::any('delete-voucher-head/{id}', [
    'middleware' => 'acl_access:journal/delete-voucher-head/{id}',
    'as' => 'delete-voucher-head',
    'uses' => 'VoucherHeadController@delete'
]);

Route::any('status-voucher-head/{id}', [
    'middleware' => 'acl_access:journal/status-voucher-head/{id}',
    'as' => 'status-voucher-head',
    'uses' => 'VoucherHeadController@change_status'
]);


Route::any('journal-voucher-history/{id}', [
    'middleware' => 'acl_access:journal/journal-voucher-history/{id}',
    'as' => 'journal-voucher-history',
    'uses' => 'VoucherHeadController@journal_voucher_history'
]);


//Voucher Head Detail.......

Route::any('voucher-detail/{id}/{voucher_number}', [
    'middleware' => 'acl_access:journal/voucher-detail/{id}/{voucher_number}',
    'as' => 'voucher-detail',
    'uses' => 'VoucherDetailController@index'
]);

Route::any('store-voucher-detail', [
    'middleware' => 'acl_access:journal/store-voucher-detail',
    'as' => 'store-voucher-detail',
    'uses' => 'VoucherDetailController@store'
]);

Route::any('view-voucher-detail/{id}', [
    'middleware' => 'acl_access:journal/view-voucher-detail/{id}',
    'as' => 'view-voucher-detail',
    'uses' => 'VoucherDetailController@show'
]);
Route::any('edit-voucher-detail/{id}', [
    'middleware' => 'acl_access:journal/edit-voucher-detail/{id}',
    'as' => 'edit-voucher-detail',
    'uses' => 'VoucherDetailController@edit'
]);
Route::any('update-voucher-detail/{id}', [
    'middleware' => 'acl_access:journal/update-voucher-detail/{id}',
    'as' => 'update-voucher-detail',
    'uses' => 'VoucherDetailController@update'
]);

Route::any('delete-voucher-detail/{id}', [
    'middleware' => 'acl_access:journal/delete-voucher-detail/{id}',
    'as' => 'delete-voucher-detail',
    'uses' => 'VoucherDetailController@delete'
]);

Route::any('destroy-voucher-detail/{id}', [
    'middleware' => 'acl_access:journal/destroy-voucher-detail/{id}',
    'as' => 'destroy-voucher-detail',
    'uses' => 'VoucherDetailController@destroy'
]);

Route::any('status-voucher-detail/{id}', [
    'middleware' => 'acl_access:journal/status-voucher-detail/{id}',
    'as' => 'status-voucher-detail',
    'uses' => 'VoucherDetailController@change_status'
]);

Route::any('search', [
    'middleware' => 'acl_access:journal/search',
    'as' => 'search',
    'uses' => 'VoucherDetailController@search'
]);

Route::any('search/autocomplete', [
    'middleware' => 'acl_access:journal/search/autocomplete',
    'as' => 'search-autocomplete',
    'uses' => 'VoucherDetailController@autocomplete'
]);
Route::any('search/autocomplete', [
    'middleware' => 'acl_access:journal/search/autocomplete',
    'as' => 'search-autocomplete',
    'uses' => 'VoucherDetailController@autocomplete'
]);

Route::any('journal-post/{voucher_number}', [
    'middleware' => 'acl_access:journal/journal-post/{voucher_number}',
    'as' => 'journal-post',
    'uses' => 'VoucherDetailController@journal_post'
]);

Route::any('ajax-account-code', [
    'middleware' => 'acl_access:journal/ajax-account-code',
    'as' => 'ajax-account-code',
    'uses' => 'VoucherDetailController@get_ajax_ac'
]);

Route::any('exchange-rate', [
    'middleware' => 'acl_access:journal/exchange-rate',
    'as' => 'exchange-rate',
    'uses' => 'VoucherDetailController@get_ajax_exchange_rate'
]);


/*
 * TODO :: search voucher
 * */

Route::get('search-voucher', [
    'middleware' => 'acl_access:journal/search-voucher',
    'as' => 'search-voucher',
    'uses' => 'VoucherHeadController@search_voucher'
]);


Route::get('search-voucher-details/{id}/{voucher_number}', [
    'middleware' => 'acl_access:journal/search-voucher-details/{id}/{voucher_number}',
    'as' => 'search-voucher-details',
    'uses' => 'VoucherDetailController@search_voucher_details'
]);

});