<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 1:34 PM
 */

Route::group(array('prefix' => 'receipt'), function() {

    /*------------------------------Receipt Voucher--------------------------*/

    Route::any('receipt-voucher', [
        'middleware' => 'acl_access:receipt/receipt-voucher',
        'as' => 'receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@index'
    ]);

    Route::any('store-receipt-voucher', [
        'middleware' => 'acl_access:receipt/store-receipt-voucher',
        'as' => 'store-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@store'
    ]);

    Route::any('view-receipt-voucher/{id}', [
        'middleware' => 'acl_access:receipt/view-receipt-voucher/{id}',
        'as' => 'view-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@show'
    ]);
    Route::any('edit-receipt-voucher/{id}', [
        'middleware' => 'acl_access:receipt/edit-receipt-voucher/{id}',
        'as' => 'edit-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@edit'
    ]);
    Route::any('update-receipt-voucher/{id}', [
        'middleware' => 'acl_access:receipt/update-receipt-voucher/{id}',
        'as' => 'update-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@update'
    ]);

    Route::any('delete-receipt-voucher/{id}', [
        'middleware' => 'acl_access:receipt/delete-receipt-voucher/{id}',
        'as' => 'delete-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@delete'
    ]);

    Route::get('search-receipt-voucher', [
        'middleware' => 'acl_access:receipt/search-receipt-voucher',
        'as' => 'search-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@search_receipt_voucher'
    ]);

    Route::any('receipt-voucher-history/{id}', [
        'middleware' => 'acl_access:receipt/receipt-voucher-history/{id}',
        'as' => 'receipt-voucher-history',
        'uses' => 'ReceiptVoucherHeadController@receipt_voucher_history'
    ]);


    /*-----------------------------------Receipt Details--------------------------*/

    Route::any('receipt-detail/{id}/{voucher_number}', [
        'middleware' => 'acl_access:receipt/receipt-detail/{id}/{voucher_number}',
        'as' => 'receipt-detail',
        'uses' => 'ReceiptVoucherDetailController@index'
    ]);

    Route::any('store-receipt-detail', [
        'middleware' => 'acl_access:receipt/store-receipt-detail',
        'as' => 'store-receipt-detail',
        'uses' => 'ReceiptVoucherDetailController@store'
    ]);

    Route::any('view-receipt-detail/{id}', [
        'middleware' => 'acl_access:receipt/view-receipt-detail/{id}',
        'as' => 'view-receipt-detail',
        'uses' => 'ReceiptVoucherDetailController@show'
    ]);
    Route::any('edit-receipt-detail/{id}', [
        'middleware' => 'acl_access:receipt/edit-receipt-detail/{id}',
        'as' => 'edit-receipt-detail',
        'uses' => 'ReceiptVoucherDetailController@edit'
    ]);
    Route::any('update-receipt-detail/{id}', [
        'middleware' => 'acl_access:receipt/update-receipt-detail/{id}',
        'as' => 'update-receipt-detail',
        'uses' => 'ReceiptVoucherDetailController@update'
    ]);

    Route::any('delete-receipt-detail/{id}', [
        'middleware' => 'acl_access:receipt/delete-receipt-detail/{id}',
        'as' => 'delete-receipt-detail',
        'uses' => 'ReceiptVoucherDetailController@delete'
    ]);

    Route::get('search-receipt-details/{id}/{voucher_number}', [
        'middleware' => 'acl_access:receipt/search-receipt-details/{id}/{voucher_number}',
        'as' => 'search-receipt-details',
        'uses' => 'ReceiptVoucherDetailController@search_receipt_details'
    ]);

});