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
        'middleware' => 'acl_access:group-one',
        'as' => 'group-one',
        'uses' => 'GroupOneController@index'
    ]);

    Route::any("store-group-one", [
        "middleware" => "acl_access:store-group-one",
        "as"   => "store-group-one",
        "uses" => "GroupOneController@store"
    ]);

    Route::any("view-group-one/{id}", [
        "middleware" => "acl_access:view-group-one/{id}",
        "as"   => "view-group-one",
        "uses" => "GroupOneController@show"
    ]);

    Route::any("edit-group-one/{id}", [
        "middleware" => "acl_access:edit-group-one/{id}",
        "as"   => "edit-group-one",
        "uses" => "GroupOneController@edit"
    ]);

    Route::any("update-group-one/{id}", [
        "middleware" => "acl_access:update-group-one/{id}",
        "as"   => "update-group-one",
        "uses" => "GroupOneController@update"
    ]);

    Route::any("delete-group-one/delete/{id}", [
        "middleware" => "acl_access:delete-group-one/delete/{id}",
        "as"   => "delete-group-one",
        "uses" => "GroupOneController@delete"
    ]);

    /**Default Offset**/

    Route::any("default-offset", [
        "middleware" => "acl_access:default-offset",
        "as"   => "default-offset",
        "uses" => "DefaultOffsetController@index"
    ]);

    Route::any("store-default-offset", [
        "middleware" => "acl_access:store-default-offset",
        "as"   => "store-default-offset",
        "uses" => "DefaultOffsetController@store"
    ]);

    Route::any("view-default-offset/{id}", [
        "middleware" => "acl_access:view-default-offset/{id}",
        "as"   => "view-default-offset",
        "uses" => "DefaultOffsetController@show"
    ]);

    Route::any("edit-default-offset/{id}", [
        "middleware" => "acl_access:edit-default-offset/{id}",
        "as"   => "edit-default-offset",
        "uses" => "DefaultOffsetController@edit"
    ]);

    Route::any("update-default-offset/{id}", [
        "middleware" => "acl_access:update-default-offset/{id}",
        "as"   => "update-default-offset",
        "uses" => "DefaultOffsetController@update"
    ]);

    Route::any("delete-default-offset/{id}", [
        "middleware" => "acl_access:delete-default-offset/{id}",
        "as"   => "delete-default-offset",
        "uses" => "DefaultOffsetController@delete"
    ]);


    /**Currency**/

    Route::get('currency', [
        'middleware' => 'acl_access:currency',
        'as' => 'currency',
        'uses' => 'CurrencyController@index'
    ]);

    Route::any("store-currency", [
        "middleware" => "acl_access:store-currency",
        "as"   => "store-currency",
        "uses" => "CurrencyController@store"
    ]);

    Route::any("view-currency/{id}", [
        "middleware" => "acl_access:view-currency/{id}",
        "as"   => "view-currency",
        "uses" => "CurrencyController@show"
    ]);

    Route::any("edit-currency/{id}", [
        "middleware" => "acl_access:edit-currency/{id}",
        "as"   => "edit-currency",
        "uses" => "CurrencyController@edit"
    ]);

    Route::any("update-currency/{id}", [
        "middleware" => "acl_access:update-currency/{id}",
        "as"   => "update-currency",
        "uses" => "CurrencyController@update"
    ]);

    Route::any("delete-currency/{id}", [
        "middleware" => "acl_access:delete-currency/{id}",
        "as"   => "delete-currency",
        "uses" => "CurrencyController@delete"
    ]);


    /**Branch**/

    Route::get("branch", [
        "middleware" => "acl_access:branch",
        "as"   => "branch",
        "uses" => "BranchController@index"
    ]);

    Route::any("store-branch", [
        "middleware" => "acl_access:store-branch",
        "as"   => "store-branch",
        "uses" => "BranchController@store"
    ]);

    Route::any("view-branch/{id}", [
        "middleware" => "acl_access:view-branch/{id}","as"   => "view-branch",
        "uses" => "BranchController@show"
    ]);

    Route::any("edit-branch/{id}", [
        "middleware" => "acl_access:edit-branch/{id}",
        "as"   => "edit-branch",
        "uses" => "BranchController@edit"
    ]);

    Route::any("update-branch/{id}", [
        "middleware" => "acl_access:update-branch/{id}",
        "as"   => "update-branch",
        "uses" => "BranchController@update"
    ]);

    Route::any("delete-branch/{id}", [
        "middleware" => "acl_access:delete-branch/{id}",
        "as"   => "delete-branch",
        "uses" => "BranchController@delete"
    ]);


    /**Chart of Accounts**/

    Route::get("chart-of-accounts", [
        "middleware" => "acl_access:chart-of-accounts",
        "as"   => "chart-of-accounts",
        "uses" => "ChartOfAccountsController@index"
    ]);

    Route::any("store-chart-of-accounts", [
        "middleware" => "acl_access:store-chart-of-accounts",
        "as"   => "store-chart-of-accounts",
        "uses" => "ChartOfAccountsController@store"
    ]);

    Route::any("view-chart-of-accounts/{id}", [
        "middleware" => "acl_access:view-chart-of-accounts/{id}",
        "as"   => "view-chart-of-accounts",
        "uses" => "ChartOfAccountsController@show"
    ]);

    Route::any("edit-chart-of-accounts/{id}", [
        "middleware" => "acl_access:edit-chart-of-accounts/{id}",
        "as"   => "edit-chart-of-accounts",
        "uses" => "ChartOfAccountsController@edit"
    ]);

    Route::any("update-chart-of-accounts/{id}", [
        "middleware" => "acl_access:update-chart-of-accounts/{id}",
        "as"   => "update-chart-of-accounts",
        "uses" => "ChartOfAccountsController@update"
    ]);

    Route::any("delete-chart-of-accounts/{id}", [
        "middleware" => "acl_access:delete-chart-of-accounts/{id}",
        "as"   => "delete-chart-of-accounts",
        "uses" => "ChartOfAccountsController@delete"
    ]);


    /**Table View :: Gl-Transaction **/

    Route::any("gl-transaction", [
        "middleware" => "acl_access:gl-transaction",
        "as"   => "gl-transaction",
        "uses" => "GlTransactionController@index"
    ]);

    /**Table View :: Voucher History **/

    Route::any("voucher-history", [
        "middleware" => "acl_access:voucher-history",
        "as"   => "voucher-history",
        "uses" => "VoucherHistoryController@index"
    ]);


    /**Settings**/

    Route::get('settings', [
        'middleware' => 'acl_access:settings',
        'as' => 'settings',
        'uses' => 'SettingsController@index'
    ]);

    Route::any("store-settings", [
        "middleware" => "acl_access:store-settings",
        "as"   => "store-settings",
        "uses" => "SettingsController@store"
    ]);

    Route::any("view-settings/{id}", [
        "middleware" => "acl_access:view-settings/{id}",
        "as"   => "view-settings",
        "uses" => "SettingsController@show"
    ]);

    Route::any("edit-settings/{id}", [
        "middleware" => "acl_access:edit-settings/{id}",
        "as"   => "edit-settings",
        "uses" => "SettingsController@edit"
    ]);

    Route::any("update-settings/{id}", [
        "middleware" => "acl_access:update-settings/{id}",
        "as"   => "update-settings",
        "uses" => "SettingsController@update"
    ]);

    Route::any("delete-settings/{id}", [
        "middleware" => "acl_access:delete-settings/{id}",
        "as"   => "delete-settings",
        "uses" => "SettingsController@delete"
    ]);



    /*
     * TODO:: Reports
     */

    Route::any("test-report", [
        "middleware" => "acl_access:test-report",
        "as"   => "test-report",
        "uses" => "AcReportsController@test_report"
    ]);


    Route::any('account-reports', [
        'middleware' => 'acl_access:account-reports',
        'as' => 'account-reports',
        'uses' => 'AcReportsController@account_reports'
    ]);

    Route::any('trial-balance', [
        'middleware' => 'acl_access:trial-balance',
        'as' => 'trial-balance',
        'uses' => 'AcReportsController@trial_balance'
    ]);

    Route::any('trial-balance-all', [
        'middleware' => 'acl_access:trial-balance-all',
        'as' => 'trial-balance-all',
        'uses' => 'AcReportsController@trial_balance_all'
    ]);

    Route::any('gl-transaction-report', [
        'middleware' => 'acl_access:gl-transaction-report',
        'as' => 'gl-transaction-report',
        'uses' => 'AcReportsController@gl_transaction_report'
    ]);


    Route::any('gl-single-voucher', [
        'middleware' => 'acl_access:gl-single-voucher',
        'as' => 'gl-single-voucher',
        'uses' => 'AcReportsController@gl_single_voucher'
    ]);

    Route::any('gl-pnl-sheet', [
        'middleware' => 'acl_access:gl-pnl-sheet',
        'as' => 'gl-pnl-sheet',
        'uses' => 'AcReportsController@gl_pnl_sheet'
    ]);


    Route::any('chart-of-accounts-report', [
        'middleware' => 'acl_access:chart-of-accounts-report',
        'as' => 'chart-of-accounts-report',
        'uses' => 'AcReportsController@chart_of_accounts_report'
    ]);

    Route::any('balance-sheet', [
        'middleware' => 'acl_access:balance-sheet',
        'as' => 'balance-sheet',
        'uses' => 'AcReportsController@balance_sheet'
    ]);

    Route::any('ledger-balance-ac', [
        'middleware' => 'acl_access:ledger-balance-ac',
        'as' => 'ledger-balance-ac',
        'uses' => 'AcReportsController@ledger_balance_ac'
    ]);

    Route::any('pdf-single-voucher/{voucher_number}', [
        'middleware' => 'acl_access:pdf-single-voucher/{voucher_number}',
        'as' => 'pdf-single-voucher',
        'uses' => 'AcReportsController@pdf_single_voucher'
    ]);

    Route::any('xls-single-voucher/{voucher_number}', [
        'middleware' => 'acl_access:xls-single-voucher/{voucher_number}',
        'as' => 'xls-single-voucher',
        'uses' => 'AcReportsController@xls_single_voucher'
    ]);


    Route::any('coa-list-report', [
        'middleware' => 'acl_access:coa-list-report',
        'as' => 'coa-list-report',
        'uses' => 'AcReportsController@get_autocomplete_search_coa'
    ]);


    /*------------------------------Payment Voucher--------------------------*/

    Route::any('payment-voucher', [
        'middleware' => 'acl_access:payment-voucher',
        'as' => 'payment-voucher',
        'uses' => 'PaymentVoucherHeadController@index'
    ]);

    Route::any('store-payment-voucher', [
        'middleware' => 'acl_access:store-payment-voucher',
        'as' => 'store-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@store'
    ]);

    Route::any('view-payment-voucher/{id}', [
        'middleware' => 'acl_access:view-payment-voucher/{id}',
        'as' => 'view-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@show'
    ]);
    Route::any('edit-payment-voucher/{id}', [
        'middleware' => 'acl_access:edit-payment-voucher/{id}',
        'as' => 'edit-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@edit'
    ]);
    Route::any('update-payment-voucher/{id}', [
        'middleware' => 'acl_access:update-payment-voucher/{id}',
        'as' => 'update-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@update'
    ]);

    Route::any('delete-payment-voucher/{id}', [
        'middleware' => 'acl_access:delete-payment-voucher/{id}',
        'as' => 'delete-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@delete'
    ]);

    Route::get('search-payment-voucher', [
        'middleware' => 'acl_access:search-payment-voucher',
        'as' => 'search-payment-voucher',
        'uses' => 'PaymentVoucherHeadController@search_payment_voucher'
    ]);

    Route::any('payment-voucher-history/{id}', [
        'middleware' => 'acl_access:payment-voucher-history/{id}',
        'as' => 'payment-voucher-history',
        'uses' => 'PaymentVoucherHeadController@payment_voucher_history'
    ]);


    /*-----------------------------------Payment Details--------------------------*/

    Route::any('payment-detail/{id}/{voucher_number}', [
         'middleware' => 'acl_access:payment-detail/{id}/{voucher_number}',
        'as' => 'payment-detail',
         'uses' => 'PaymentVoucherDetailController@index'
     ]);

    Route::any('store-payment-detail', [
         'middleware' => 'acl_access:store-payment-detail',
        'as' => 'store-payment-detail',
         'uses' => 'PaymentVoucherDetailController@store'
     ]);

     Route::any('view-payment-detail/{id}', [
         'middleware' => 'acl_access:view-payment-detail/{id}',
         'as' => 'view-payment-detail',
         'uses' => 'PaymentVoucherDetailController@show'
     ]);
     Route::any('edit-payment-detail/{id}', [
         'middleware' => 'acl_access:edit-payment-detail/{id}',
         'as' => 'edit-payment-detail',
         'uses' => 'PaymentVoucherDetailController@edit'
     ]);
     Route::any('update-payment-detail/{id}', [
         'middleware' => 'acl_access:update-payment-detail/{id}',
         'as' => 'update-payment-detail',
         'uses' => 'PaymentVoucherDetailController@update'
     ]);

     Route::any('delete-payment-detail/{id}', [
         'middleware' => 'acl_access:delete-payment-detail/{id}',
         'as' => 'delete-payment-detail',
         'uses' => 'PaymentVoucherDetailController@delete'
     ]);

     Route::get('search-payment-details/{id}/{voucher_number}', [
         'middleware' => 'acl_access:search-payment-details/{id}/{voucher_number}',
         'as' => 'search-payment-details',
         'uses' => 'PaymentVoucherDetailController@search_payment_details'
     ]);


    /*------------------------------Receipt Voucher--------------------------*/

    Route::any('receipt-voucher', [
        'middleware' => 'acl_access:receipt-voucher',
        'as' => 'receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@index'
    ]);

    Route::any('store-receipt-voucher', [
        'middleware' => 'acl_access:store-receipt-voucher',
        'as' => 'store-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@store'
    ]);

    Route::any('view-receipt-voucher/{id}', [
        'middleware' => 'acl_access:view-receipt-voucher/{id}',
        'as' => 'view-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@show'
    ]);
    Route::any('edit-receipt-voucher/{id}', [
        'middleware' => 'acl_access:edit-receipt-voucher/{id}',
        'as' => 'edit-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@edit'
    ]);
    Route::any('update-receipt-voucher/{id}', [
        'middleware' => 'acl_access:update-receipt-voucher/{id}',
        'as' => 'update-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@update'
    ]);

    Route::any('delete-receipt-voucher/{id}', [
        'middleware' => 'acl_access:delete-receipt-voucher/{id}',
        'as' => 'delete-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@delete'
    ]);

    Route::get('search-receipt-voucher', [
        'middleware' => 'acl_access:search-receipt-voucher',
        'as' => 'search-receipt-voucher',
        'uses' => 'ReceiptVoucherHeadController@search_receipt_voucher'
    ]);

    Route::any('receipt-voucher-history/{id}', [
        'middleware' => 'acl_access:receipt-voucher-history/{id}',
        'as' => 'receipt-voucher-history',
        'uses' => 'ReceiptVoucherHeadController@receipt_voucher_history'
    ]);


    /*-----------------------------------Receipt Details--------------------------*/

     Route::any('receipt-detail/{id}/{voucher_number}', [
         'middleware' => 'acl_access:receipt-detail/{id}/{voucher_number}',
         'as' => 'receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@index'
     ]);

     Route::any('store-receipt-detail', [
         'middleware' => 'acl_access:store-receipt-detail',
         'as' => 'store-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@store'
     ]);

     Route::any('view-receipt-detail/{id}', [
         'middleware' => 'acl_access:view-receipt-detail/{id}',
         'as' => 'view-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@show'
     ]);
     Route::any('edit-receipt-detail/{id}', [
         'middleware' => 'acl_access:edit-receipt-detail/{id}',
         'as' => 'edit-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@edit'
     ]);
     Route::any('update-receipt-detail/{id}', [
         'middleware' => 'acl_access:update-receipt-detail/{id}',
         'as' => 'update-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@update'
     ]);

     Route::any('delete-receipt-detail/{id}', [
         'middleware' => 'acl_access:delete-receipt-detail/{id}',
         'as' => 'delete-receipt-detail',
         'uses' => 'ReceiptVoucherDetailController@delete'
     ]);

     Route::get('search-receipt-details/{id}/{voucher_number}', [
         'middleware' => 'acl_access:search-receipt-details/{id}/{voucher_number}',
         'as' => 'search-receipt-details',
         'uses' => 'ReceiptVoucherDetailController@search_receipt_details'
     ]);



});

