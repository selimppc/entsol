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

});

