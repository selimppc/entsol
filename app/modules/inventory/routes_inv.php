<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 3/29/16
 * Time: 1:59 PM
 */

/*........buyer..........*/

Route::any('buyer', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'buyer',
    'uses' => 'BuyerController@index'
]);

Route::any('store-buyer', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-buyer',
    'uses' => 'BuyerController@store'
]);

Route::any('view-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-buyer',
    'uses' => 'BuyerController@show'
]);

Route::any('edit-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-buyer',
    'uses' => 'BuyerController@edit'
]);

Route::any('update-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-buyer',
    'uses' => 'BuyerController@update'
]);

Route::any('delete-buyer/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-buyer',
    'uses' => 'BuyerController@delete'

]);


/*........yarn_count..........*/

Route::any('yarn-count', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'yarn-count',
    'uses' => 'YarnCountController@index'
]);

Route::any('store-yarn-count', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-yarn-count',
    'uses' => 'YarnCountController@store'
]);

Route::any('view-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-yarn-count',
    'uses' => 'YarnCountController@show'
]);

Route::any('edit-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-yarn-count',
    'uses' => 'YarnCountController@edit'
]);

Route::any('update-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-yarn-count',
    'uses' => 'YarnCountController@update'
]);

Route::any('delete-yarn-count/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-yarn-count',
    'uses' => 'YarnCountController@delete'

]);

/*........yarn_composition..........*/

Route::any('yarn-composition', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'yarn-composition',
    'uses' => 'YarnCompositionController@index'
]);

Route::any('store-yarn-composition', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-yarn-composition',
    'uses' => 'YarnCompositionController@store'
]);

Route::any('view-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-yarn-composition',
    'uses' => 'YarnCompositionController@show'
]);

Route::any('edit-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-yarn-composition',
    'uses' => 'YarnCompositionController@edit'
]);

Route::any('update-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-yarn-composition',
    'uses' => 'YarnCompositionController@update'
]);

Route::any('delete-yarn-composition/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-yarn-composition',
    'uses' => 'YarnCompositionController@delete'

]);

/*........product_brand..........*/

Route::any('product-brand', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'product-brand',
    'uses' => 'ProductBrandController@index'
]);

Route::any('store-product-brand', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-product-brand',
    'uses' => 'ProductBrandController@store'
]);

Route::any('view-product-brand/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-product-brand',
    'uses' => 'ProductBrandController@show'
]);

Route::any('edit-product-brand/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-product-brand',
    'uses' => 'ProductBrandController@edit'
]);

Route::any('update-product-brand/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-product-brand',
    'uses' => 'ProductBrandController@update'
]);

Route::any('delete-product-brand/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-product-brand',
    'uses' => 'ProductBrandController@delete'

]);


/*........yarn-type..........*/

Route::any('yarn-type', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'yarn-type',
    'uses' => 'YarnTypeController@index'
]);

Route::any('store-yarn-type', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-yarn-type',
    'uses' => 'YarnTypeController@store'
]);

Route::any('view-yarn-type/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-yarn-type',
    'uses' => 'YarnTypeController@show'
]);

Route::any('edit-yarn-type/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-yarn-type',
    'uses' => 'YarnTypeController@edit'
]);

Route::any('update-yarn-type/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-yarn-type',
    'uses' => 'YarnTypeController@update'
]);

Route::any('delete-yarn-type/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-yarn-type',
    'uses' => 'YarnTypeController@delete'

]);


/*........yarn-color..........*/

Route::any('yarn-color', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'yarn-color',
    'uses' => 'YarnColorController@index'
]);

Route::any('store-yarn-color', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-yarn-color',
    'uses' => 'YarnColorController@store'
]);

Route::any('view-yarn-color/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-yarn-color',
    'uses' => 'YarnColorController@show'
]);

Route::any('edit-yarn-color/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-yarn-color',
    'uses' => 'YarnColorController@edit'
]);

Route::any('update-yarn-color/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-yarn-color',
    'uses' => 'YarnColorController@update'
]);

Route::any('delete-yarn-color/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-yarn-color',
    'uses' => 'YarnColorController@delete'

]);

/*........product_category..........*/

Route::any('product-category', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'product-category',
    'uses' => 'ProductCategoryController@index'
]);

Route::any('store-product-category', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-product-category',
    'uses' => 'ProductCategoryController@store'
]);

Route::any('view-product-category/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-product-category',
    'uses' => 'ProductCategoryController@show'
]);

Route::any('edit-product-category/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-product-category',
    'uses' => 'ProductCategoryController@edit'
]);

Route::any('update-product-category/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-product-category',
    'uses' => 'ProductCategoryController@update'
]);

Route::any('delete-product-category/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-product-category',
    'uses' => 'ProductCategoryController@delete'

]);

/*........product_group..........*/

Route::any('product-group', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'product-group',
    'uses' => 'ProductGroupController@index'
]);

Route::any('store-product-group', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-product-group',
    'uses' => 'ProductGroupController@store'
]);

Route::any('view-product-group/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-product-group',
    'uses' => 'ProductGroupController@show'
]);

Route::any('edit-product-group/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-product-group',
    'uses' => 'ProductGroupController@edit'
]);

Route::any('update-product-group/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-product-group',
    'uses' => 'ProductGroupController@update'
]);

Route::any('delete-product-group/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-product-group',
    'uses' => 'ProductGroupController@delete'

]);


/*........inv-supplier..........*/

Route::any('inv-supplier', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'inv-supplier',
    'uses' => 'InvSupplierController@index'
]);

Route::any('store-inv-supplier', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-inv-supplier',
    'uses' => 'InvSupplierController@store'
]);

Route::any('view-inv-supplier/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-inv-supplier',
    'uses' => 'InvSupplierController@show'
]);

Route::any('edit-inv-supplier/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-inv-supplier',
    'uses' => 'InvSupplierController@edit'
]);

Route::any('update-inv-supplier/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-inv-supplier',
    'uses' => 'InvSupplierController@update'
]);

Route::any('delete-inv-supplier/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-inv-supplier',
    'uses' => 'InvSupplierController@delete'

]);

/*........business..........*/

Route::any('business', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'business',
    'uses' => 'BusinessController@index'
]);

Route::any('store-business', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-business',
    'uses' => 'BusinessController@store'
]);

Route::any('view-business/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-business',
    'uses' => 'BusinessController@show'
]);

Route::any('edit-business/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-business',
    'uses' => 'BusinessController@edit'
]);

Route::any('update-business/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-business',
    'uses' => 'BusinessController@update'
]);

Route::any('delete-business/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-business',
    'uses' => 'BusinessController@delete'

]);



/*........inv-store..........*/

Route::any('inv-store', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'inv-store',
    'uses' => 'StoreController@index'
]);

Route::any('add-inv-store', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'add-inv-store',
    'uses' => 'StoreController@store'
]);

Route::any('view-inv-store/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-inv-store',
    'uses' => 'StoreController@show'
]);

Route::any('edit-inv-store/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-inv-store',
    'uses' => 'StoreController@edit'
]);

Route::any('update-inv-store/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-inv-store',
    'uses' => 'StoreController@update'
]);

Route::any('delete-inv-store/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-inv-store',
    'uses' => 'StoreController@delete'

]);


/*........  product  ..........*/

Route::any('product', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'product',
    'uses' => 'ProductController@index'
]);

Route::any('store-product', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'store-product',
    'uses' => 'ProductController@store'
]);

Route::any('view-product/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'view-product',
    'uses' => 'ProductController@show'
]);

Route::any('edit-product/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'edit-product',
    'uses' => 'ProductController@edit'
]);

Route::any('update-product/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'update-product',
    'uses' => 'ProductController@update'
]);

Route::any('delete-product/{id}', [
    //'middleware' => 'acl_access:user/add-user',
    'as' => 'delete-product',
    'uses' => 'ProductController@delete'

]);



