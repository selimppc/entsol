<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/15/16
 * Time: 1:57 PM
 */

Route::group(array('prefix' => 'reports'), function() {


    Route::any("test-report", [
        "middleware" => "acl_access:reports/test-report",
        "as"   => "test-report",
        "uses" => "AcReportsController@test_report"
    ]);


    Route::any('account-reports', [
        'middleware' => 'acl_access:reports/account-reports',
        'as' => 'account-reports',
        'uses' => 'AcReportsController@account_reports'
    ]);

    Route::any('trial-balance', [
        'middleware' => 'acl_access:reports/trial-balance',
        'as' => 'trial-balance',
        'uses' => 'AcReportsController@trial_balance'
    ]);

    Route::any('trial-balance-all', [
        'middleware' => 'acl_access:reports/trial-balance-all',
        'as' => 'trial-balance-all',
        'uses' => 'AcReportsController@trial_balance_all'
    ]);

    Route::any('gl-transaction-report', [
        'middleware' => 'acl_access:reports/gl-transaction-report',
        'as' => 'gl-transaction-report',
        'uses' => 'AcReportsController@gl_transaction_report'
    ]);


    Route::any('gl-single-voucher', [
        'middleware' => 'acl_access:reports/gl-single-voucher',
        'as' => 'gl-single-voucher',
        'uses' => 'AcReportsController@gl_single_voucher'
    ]);

    Route::any('gl-pnl-sheet', [
        'middleware' => 'acl_access:reports/gl-pnl-sheet',
        'as' => 'gl-pnl-sheet',
        'uses' => 'AcReportsController@gl_pnl_sheet'
    ]);


    Route::any('chart-of-accounts-report', [
        'middleware' => 'acl_access:reports/chart-of-accounts-report',
        'as' => 'chart-of-accounts-report',
        'uses' => 'AcReportsController@chart_of_accounts_report'
    ]);

    Route::any('balance-sheet', [
        'middleware' => 'acl_access:reports/balance-sheet',
        'as' => 'balance-sheet',
        'uses' => 'AcReportsController@balance_sheet'
    ]);

    Route::any('ledger-balance-ac', [
        'middleware' => 'acl_access:reports/ledger-balance-ac',
        'as' => 'ledger-balance-ac',
        'uses' => 'AcReportsController@ledger_balance_ac'
    ]);

    Route::any('pdf-single-voucher/{voucher_number}', [
        'middleware' => 'acl_access:reports/pdf-single-voucher/{voucher_number}',
        'as' => 'pdf-single-voucher',
        'uses' => 'AcReportsController@pdf_single_voucher'
    ]);

    Route::any('xls-single-voucher/{voucher_number}', [
        'middleware' => 'acl_access:reports/xls-single-voucher/{voucher_number}',
        'as' => 'xls-single-voucher',
        'uses' => 'AcReportsController@xls_single_voucher'
    ]);


    Route::any('coa-list-report', [
        'middleware' => 'acl_access:reports/coa-list-report',
        'as' => 'coa-list-report',
        'uses' => 'AcReportsController@get_autocomplete_search_coa'
    ]);
});