<?php
/**
 * Created by PhpStorm.
 * User: selim
 * Date: 12/8/2015
 * Time: 5:54 PM
 */

Route::group(array('middleware' => 'auth','modules'=>'Accounts', 'namespace' => 'App\Modules\Accounts\Controllers'), function() {
    //Your routes belong to this module.
    //@include('routes_tjt.php');
    @include('routes_journal.php');
    @include('routes_payment.php');
    @include('routes_receipt.php');
    @include('routes_reports.php');
    @include('routes_reverse.php');

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


});

