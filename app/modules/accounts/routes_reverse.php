<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 1:07 PM
 */
Route::group(array('prefix' => 'reverse'), function() {


    /*------------------------------Reverse Voucher--------------------------*/

    Route::any('reverse-voucher', [
        'middleware' => 'acl_access:reverse/reverse-voucher',
        'as' => 'reverse-voucher',
        'uses' => 'ReverseVoucherHeadController@index'
    ]);

    Route::any('store-reverse-voucher', [
        'middleware' => 'acl_access:reverse/store-reverse-voucher',
        'as' => 'store-reverse-voucher',
        'uses' => 'ReverseVoucherHeadController@store'
    ]);

    Route::any('view-reverse-voucher/{id}', [
        'middleware' => 'acl_access:reverse/view-reverse-voucher/{id}',
        'as' => 'view-reverse-voucher',
        'uses' => 'ReverseVoucherHeadController@show'
    ]);
    Route::any('edit-reverse-voucher/{id}', [
        'middleware' => 'acl_access:reverse/edit-reverse-voucher/{id}',
        'as' => 'edit-reverse-voucher',
        'uses' => 'ReverseVoucherHeadController@edit'
    ]);
    Route::any('update-reverse-voucher/{id}', [
        'middleware' => 'acl_access:reverse/update-reverse-voucher/{id}',
        'as' => 'update-reverse-voucher',
        'uses' => 'ReverseVoucherHeadController@update'
    ]);

    Route::any('delete-reverse-voucher/{id}', [
        'middleware' => 'acl_access:reverse/delete-reverse-voucher/{id}',
        'as' => 'delete-reverse-voucher',
        'uses' => 'ReverseVoucherHeadController@delete'
    ]);

    Route::get('search-reverse_entry', [
        'middleware' => 'acl_access:reverse/search-reverse_entry',
        'as' => 'search-reverse_entry',
        'uses' => 'ReverseVoucherHeadController@search_reverse_entry'
    ]);

    Route::any('reverse-voucher-history/{id}', [
        'middleware' => 'acl_access:reverse/reverse-voucher-history/{id}',
        'as' => 'reverse-voucher-history',
        'uses' => 'ReverseVoucherHeadController@reverse_voucher_history'
    ]);


    /*-----------------------------------Reverse Details--------------------------*/

    Route::any('reverse-detail/{id}/{voucher_number}', [
        'middleware' => 'acl_access:reverse/reverse-detail/{id}/{voucher_number}',
        'as' => 'reverse-detail',
        'uses' => 'ReverseVoucherDetailController@index'
    ]);

    Route::any('store-reverse-detail', [
        'middleware' => 'acl_access:reverse/store-reverse-detail',
        'as' => 'store-reverse-detail',
        'uses' => 'ReverseVoucherDetailController@store'
    ]);

    Route::any('view-reverse-detail/{id}', [
        'middleware' => 'acl_access:reverse/view-reverse-detail/{id}',
        'as' => 'view-reverse-detail',
        'uses' => 'ReverseVoucherDetailController@show'
    ]);
    Route::any('edit-reverse-detail/{id}', [
        'middleware' => 'acl_access:reverse/edit-reverse-detail/{id}',
        'as' => 'edit-reverse-detail',
        'uses' => 'ReverseVoucherDetailController@edit'
    ]);
    Route::any('update-reverse-detail/{id}', [
        'middleware' => 'acl_access:reverse/update-reverse-detail/{id}',
        'as' => 'update-reverse-detail',
        'uses' => 'ReverseVoucherDetailController@update'
    ]);

    Route::any('delete-reverse-detail/{id}', [
        'middleware' => 'acl_access:reverse/delete-reverse-detail/{id}',
        'as' => 'delete-reverse-detail',
        'uses' => 'ReverseVoucherDetailController@delete'
    ]);

    Route::get('search-reverse-details/{id}/{voucher_number}', [
        'middleware' => 'acl_access:reverse/search-reverse-details/{id}/{voucher_number}',
        'as' => 'search-reverse-details',
        'uses' => 'ReverseVoucherDetailController@search_reverse_details'
    ]);
});