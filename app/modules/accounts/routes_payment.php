<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 1:10 PM
 */
Route::group(array('prefix' => 'payment'), function() {

/*------------------------------Payment Voucher--------------------------*/

Route::any('payment-voucher', [
    'middleware' => 'acl_access:payment/payment-voucher',
    'as' => 'payment-voucher',
    'uses' => 'PaymentVoucherHeadController@index'
]);

Route::any('store-payment-voucher', [
    'middleware' => 'acl_access:payment/store-payment-voucher',
    'as' => 'store-payment-voucher',
    'uses' => 'PaymentVoucherHeadController@store'
]);

Route::any('view-payment-voucher/{id}', [
    'middleware' => 'acl_access:payment/view-payment-voucher/{id}',
    'as' => 'view-payment-voucher',
    'uses' => 'PaymentVoucherHeadController@show'
]);
Route::any('edit-payment-voucher/{id}', [
    'middleware' => 'acl_access:payment/edit-payment-voucher/{id}',
    'as' => 'edit-payment-voucher',
    'uses' => 'PaymentVoucherHeadController@edit'
]);
Route::any('update-payment-voucher/{id}', [
    'middleware' => 'acl_access:payment/update-payment-voucher/{id}',
    'as' => 'update-payment-voucher',
    'uses' => 'PaymentVoucherHeadController@update'
]);

Route::any('delete-payment-voucher/{id}', [
    'middleware' => 'acl_access:payment/delete-payment-voucher/{id}',
    'as' => 'delete-payment-voucher',
    'uses' => 'PaymentVoucherHeadController@delete'
]);

Route::get('search-payment-voucher', [
    'middleware' => 'acl_access:payment/search-payment-voucher',
    'as' => 'search-payment-voucher',
    'uses' => 'PaymentVoucherHeadController@search_payment_voucher'
]);

Route::any('payment-voucher-history/{id}', [
    'middleware' => 'acl_access:payment/payment-voucher-history/{id}',
    'as' => 'payment-voucher-history',
    'uses' => 'PaymentVoucherHeadController@payment_voucher_history'
]);


/*-----------------------------------Payment Details--------------------------*/

Route::any('payment-detail/{id}/{voucher_number}', [
    'middleware' => 'acl_access:payment/payment-detail/{id}/{voucher_number}',
    'as' => 'payment-detail',
    'uses' => 'PaymentVoucherDetailController@index'
]);

Route::any('store-payment-detail', [
    'middleware' => 'acl_access:payment/store-payment-detail',
    'as' => 'store-payment-detail',
    'uses' => 'PaymentVoucherDetailController@store'
]);

Route::any('view-payment-detail/{id}', [
    'middleware' => 'acl_access:payment/view-payment-detail/{id}',
    'as' => 'view-payment-detail',
    'uses' => 'PaymentVoucherDetailController@show'
]);
Route::any('edit-payment-detail/{id}', [
    'middleware' => 'acl_access:payment/edit-payment-detail/{id}',
    'as' => 'edit-payment-detail',
    'uses' => 'PaymentVoucherDetailController@edit'
]);
Route::any('update-payment-detail/{id}', [
    'middleware' => 'acl_access:payment/update-payment-detail/{id}',
    'as' => 'update-payment-detail',
    'uses' => 'PaymentVoucherDetailController@update'
]);

Route::any('delete-payment-detail/{id}', [
    'middleware' => 'acl_access:payment/delete-payment-detail/{id}',
    'as' => 'delete-payment-detail',
    'uses' => 'PaymentVoucherDetailController@delete'
]);

Route::get('search-payment-details/{id}/{voucher_number}', [
    'middleware' => 'acl_access:payment/search-payment-details/{id}/{voucher_number}',
    'as' => 'search-payment-details',
    'uses' => 'PaymentVoucherDetailController@search_payment_details'
]);

});