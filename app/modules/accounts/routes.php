<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('middleware' => 'auth','modules'=>'Accounts', 'namespace' => 'App\Modules\Accounts\Controllers'), function() {
    //Your routes belong to this module.
    @include('routes_tjt.php');

    Route::get('accounts', function () {
        return 'Welcome In Accounts Module';
    });

    /**Group One**/

    Route::get('group-one', [
        'as' => 'group-one',
        'uses' => 'GroupOneController@index'
    ]);

    Route::any("store-group-one", [
        "as"   => "store-group-one",
        "uses" => "GroupOneController@store"
    ]);

    Route::any("view-group-one/{id}", [
        "as"   => "view-group-one",
        "uses" => "GroupOneController@show"
    ]);

    Route::any("edit-group-one/{id}", [
        "as"   => "edit-group-one",
        "uses" => "GroupOneController@edit"
    ]);

    Route::any("update-group-one/{id}", [
        "as"   => "update-group-one",
        "uses" => "GroupOneController@update"
    ]);

    Route::any("delete-group-one/delete/{id}", [
        "as"   => "delete-group-one",
        "uses" => "GroupOneController@delete"
    ]);

    /**Default Offset**/

    Route::any("default-offset", [
        "as"   => "default-offset",
        "uses" => "DefaultOffsetController@index"
    ]);

    Route::any("store-default-offset", [
        "as"   => "store-default-offset",
        "uses" => "DefaultOffsetController@store"
    ]);

    Route::any("view-default-offset/{id}", [
        "as"   => "view-default-offset",
        "uses" => "DefaultOffsetController@show"
    ]);

    Route::any("edit-default-offset/{id}", [
        "as"   => "edit-default-offset",
        "uses" => "DefaultOffsetController@edit"
    ]);

    Route::any("update-default-offset/{id}", [
        "as"   => "update-default-offset",
        "uses" => "DefaultOffsetController@update"
    ]);

    Route::any("delete-default-offset/{id}", [
        "as"   => "delete-default-offset",
        "uses" => "DefaultOffsetController@delete"
    ]);


    /**Currency**/

    Route::get('currency', [
        'as' => 'currency',
        'uses' => 'CurrencyController@index'
    ]);

    Route::any("store-currency", [
        "as"   => "store-currency",
        "uses" => "CurrencyController@store"
    ]);

    Route::any("view-currency/{id}", [
        "as"   => "view-currency",
        "uses" => "CurrencyController@show"
    ]);

    Route::any("edit-currency/{id}", [
        "as"   => "edit-currency",
        "uses" => "CurrencyController@edit"
    ]);

    Route::any("update-currency/{id}", [
        "as"   => "update-currency",
        "uses" => "CurrencyController@update"
    ]);

    Route::any("delete-currency/{id}", [
        "as"   => "delete-currency",
        "uses" => "CurrencyController@delete"
    ]);


    /**Branch**/

    Route::get("branch", [
        "as"   => "branch",
        "uses" => "BranchController@index"
    ]);

    Route::any("store-branch", [
        "as"   => "store-branch",
        "uses" => "BranchController@store"
    ]);

    Route::any("view-branch/{id}", [
        "as"   => "view-branch",
        "uses" => "BranchController@show"
    ]);

    Route::any("edit-branch/{id}", [
        "as"   => "edit-branch",
        "uses" => "BranchController@edit"
    ]);

    Route::any("update-branch/{id}", [
        "as"   => "update-branch",
        "uses" => "BranchController@update"
    ]);

    Route::any("delete-branch/{id}", [
        "as"   => "delete-branch",
        "uses" => "BranchController@delete"
    ]);


    /**Chart of Accounts**/

    Route::get("chart-of-accounts", [
        "as"   => "chart-of-accounts",
        "uses" => "ChartOfAccountsController@index"
    ]);

    Route::any("store-chart-of-accounts", [
        "as"   => "store-chart-of-accounts",
        "uses" => "ChartOfAccountsController@store"
    ]);

    Route::any("view-chart-of-accounts/{id}", [
        "as"   => "view-chart-of-accounts",
        "uses" => "ChartOfAccountsController@show"
    ]);

    Route::any("edit-chart-of-accounts/{id}", [
        "as"   => "edit-chart-of-accounts",
        "uses" => "ChartOfAccountsController@edit"
    ]);

    Route::any("update-chart-of-accounts/{id}", [
        "as"   => "update-chart-of-accounts",
        "uses" => "ChartOfAccountsController@update"
    ]);

    Route::any("delete-chart-of-accounts/{id}", [
        "as"   => "delete-chart-of-accounts",
        "uses" => "ChartOfAccountsController@delete"
    ]);


    /**Table View :: Gl-Transaction **/

    Route::any("gl-transaction", [
        "as"   => "gl-transaction",
        "uses" => "GlTransactionController@index"
    ]);

    /**Table View :: Voucher History **/

    Route::any("voucher-history", [
        "as"   => "voucher-history",
        "uses" => "VoucherHistoryController@index"
    ]);


    /**Settings**/

    Route::get('settings', [
        'as' => 'settings',
        'uses' => 'SettingsController@index'
    ]);

    Route::any("store-settings", [
        "as"   => "store-settings",
        "uses" => "SettingsController@store"
    ]);

    Route::any("view-settings/{id}", [
        "as"   => "view-settings",
        "uses" => "SettingsController@show"
    ]);

    Route::any("edit-settings/{id}", [
        "as"   => "edit-settings",
        "uses" => "SettingsController@edit"
    ]);

    Route::any("update-settings/{id}", [
        "as"   => "update-settings",
        "uses" => "SettingsController@update"
    ]);

    Route::any("delete-settings/{id}", [
        "as"   => "delete-settings",
        "uses" => "SettingsController@delete"
    ]);



    /*
     * TODO:: Reports
     */

    Route::any("test-report", [
        "as"   => "test-report",
        "uses" => "AcReportsController@test_report"
    ]);


    Route::any('account-reports', [
        'as' => 'account-reports',
        'uses' => 'AcReportsController@account_reports'
    ]);

    Route::any('trial-balance', [
        'as' => 'trial-balance',
        'uses' => 'AcReportsController@trial_balance'
    ]);

    Route::any('trial-balance-all', [
        'as' => 'trial-balance-all',
        'uses' => 'AcReportsController@trial_balance_all'
    ]);

    Route::any('gl-transaction-report', [
        'as' => 'gl-transaction-report',
        'uses' => 'AcReportsController@gl_transaction_report'
    ]);


    Route::any('gl-single-voucher', [
        'as' => 'gl-single-voucher',
        'uses' => 'AcReportsController@gl_single_voucher'
    ]);

    Route::any('gl-pnl-sheet', [
        'as' => 'gl-pnl-sheet',
        'uses' => 'AcReportsController@gl_pnl_sheet'
    ]);


    Route::any('chart-of-accounts-report', [
        'as' => 'chart-of-accounts-report',
        'uses' => 'AcReportsController@chart_of_accounts_report'
    ]);

    Route::any('balance-sheet', [
        'as' => 'balance-sheet',
        'uses' => 'AcReportsController@balance_sheet'
    ]);

    Route::any('pdf-single-voucher/{voucher_number}', [
        'as' => 'pdf-single-voucher',
        'uses' => 'AcReportsController@pdf_single_voucher'
    ]);

    Route::any('xls-single-voucher/{voucher_number}', [
        'as' => 'xls-single-voucher',
        'uses' => 'AcReportsController@xls_single_voucher'
    ]);


    /*------------------------------Payment Voucher--------------------------*/

    Route::any('payment-voucher', [
        'as' => 'payment-voucher',
        'uses' => 'PaymentVoucherHeadController@index'
    ]);

    Route::any('store-payment-voucher', [
        'as' => 'store-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@store'
    ]);

    Route::any('view-payment-voucher/{id}', [
        'as' => 'view-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@show'
    ]);
    Route::any('edit-payment-voucher/{id}', [
        'as' => 'edit-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@edit'
    ]);
    Route::any('update-payment-voucher/{id}', [
        'as' => 'update-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@update'
    ]);

    Route::any('delete-payment-voucher/{id}', [
        'as' => 'delete-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@delete'
    ]);

    Route::get('search-payment-voucher', [
        'as' => 'search-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@search_payment_voucher'
    ]);

    Route::any('payment-voucher-history/{id}', [
        'as' => 'payment-voucher-history',
        'uses' => 'PaymentVoucherHeadController@payment_voucher_history'
    ]);


    /*-----------------------------------Payment Details--------------------------*/

    Route::any('payment-detail/{id}/{voucher_number}', [
         'as' => 'payment-detail',
         'uses' => 'PaymentVoucherDetailController@index'
     ]);

    Route::any('store-payment-detail', [
         'as' => 'store-payment-detail',
         'uses' => 'PaymentVoucherDetailController@store'
     ]);

     Route::any('view-payment-detail/{id}', [
         'as' => 'view-payment-detail',
         'uses' => 'PaymentVoucherDetailController@show'
     ]);
     Route::any('edit-payment-detail/{id}', [
         'as' => 'edit-payment-detail',
         'uses' => 'PaymentVoucherDetailController@edit'
     ]);
     Route::any('update-payment-detail/{id}', [
         'as' => 'update-payment-detail',
         'uses' => 'PaymentVoucherDetailController@update'
     ]);

     Route::any('delete-payment-detail/{id}', [
         'as' => 'delete-payment-detail',
         'uses' => 'PaymentVoucherDetailController@delete'
     ]);

     Route::get('search-payment-details/{id}/{voucher_number}', [
         'as' => 'search-payment-details',
         'uses' => 'PaymentVoucherDetailController@search_payment_details'
     ]);


    /*------------------------------Receipt Voucher--------------------------*/

    Route::any('receipt-voucher', [
        'as' => 'receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@index'
    ]);

    Route::any('store-receipt-voucher', [
        'as' => 'store-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@store'
    ]);

    Route::any('view-receipt-voucher/{id}', [
        'as' => 'view-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@show'
    ]);
    Route::any('edit-receipt-voucher/{id}', [
        'as' => 'edit-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@edit'
    ]);
    Route::any('update-receipt-voucher/{id}', [
        'as' => 'update-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@update'
    ]);

    Route::any('delete-receipt-voucher/{id}', [
        'as' => 'delete-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@delete'
    ]);

    Route::get('search-receipt-voucher', [
        'as' => 'search-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@search_receipt_voucher'
    ]);

    Route::any('receipt-voucher-history/{id}', [
        'as' => 'receipt-voucher-history',
        'uses' => 'ReceiptVoucherHeadController@receipt_voucher_history'
    ]);


    /*-----------------------------------Receipt Details--------------------------*/

     Route::any('receipt-detail/{id}/{voucher_number}', [
         'as' => 'receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@index'
     ]);

     Route::any('store-receipt-detail', [
         'as' => 'store-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@store'
     ]);

     Route::any('view-receipt-detail/{id}', [
         'as' => 'view-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@show'
     ]);
     Route::any('edit-receipt-detail/{id}', [
         'as' => 'edit-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@edit'
     ]);
     Route::any('update-receipt-detail/{id}', [
         'as' => 'update-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@update'
     ]);

     Route::any('delete-receipt-detail/{id}', [
         'as' => 'delete-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@delete'
     ]);

     Route::get('search-receipt-details/{id}/{voucher_number}', [
         'as' => 'search-receipt-details',
         'uses' => 'ReceiptVoucherDetailController@search_receipt_details'
     ]);



});

