<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/14/16
 * Time: 3:59 PM
 */

Route::group(array('middleware' => 'auth','modules'=>'Admin', 'namespace' => 'App\Modules\Admin\Controllers'), function() {
    //Your routes belong to this module.

/*Form Components*/
Route::get('form-elements', function () {
    return view('admin::layouts.example_pages.form_elements');
});

/* Form Sample For Registration*/
Route::get('reg-sample', function () {
    return view('admin::layouts.example_pages.reg_form');
});

Route::any('admin', [
    'as' => 'admin',
    'uses' => 'AdminController@index'
]);

Route::any('content-page', [
    'as' => 'content-page',
    'uses' => 'AdminController@content_page'
]);


Route::any('validation-page', [
    'as' => 'validation-page',
    'uses' => 'AdminController@validation_page'
]);


/**Menu Panel**/

Route::get("menu-panel", [
    //"middleware" => "acl_access:branch",
    "as"   => "menu-panel",
    "uses" => "MenuPanelController@index"
]);

Route::any("store-menu-panel", [
    //"middleware" => "acl_access:store-branch",
    "as"   => "store-menu-panel",
    "uses" => "MenuPanelController@store"
]);

Route::any("search-menu-panel", [
    //"middleware" => "acl_access:search-menu-panel",
    "as"   => "search-menu-panel",
    "uses" => "MenuPanelController@search_menu_panel"
]);

Route::any("view-menu-panel/{id}", [
    //"middleware" => "acl_access:view-branch/{id}",
    "as"   => "view-menu-panel",
    "uses" => "MenuPanelController@show"
]);

Route::any("edit-menu-panel/{id}", [
    //"middleware" => "acl_access:edit-branch/{id}",
    "as"   => "edit-menu-panel",
    "uses" => "MenuPanelController@edit"
]);

Route::any("update-menu-panel/{id}", [
    //"middleware" => "acl_access:update-branch/{id}",
    "as"   => "update-menu-panel",
    "uses" => "MenuPanelController@update"
]);

Route::any("delete-menu-panel/{id}", [
    //"middleware" => "acl_access:delete-branch/{id}",
    "as"   => "delete-menu-panel",
    "uses" => "MenuPanelController@delete"
]);

Route::any('menu-list', [
    //'middleware' => 'acl_access:exchange-rate',
    'as' => 'menu-list',
    'uses' => 'MenuPanelController@get_ajax_menu_list'
]);

});





