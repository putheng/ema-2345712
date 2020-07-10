<?php

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('agent/store', 'Agent\AgentController@store');
    Route::get('agent/show', 'Agent\AgentController@show');

    Route::get('agent/show/{user}/members', 'Agent\AgentController@members');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
        
        Route::resource('product', 'ProductController');
        Route::resource('category', 'CategoryController');
        Route::get('product/{product}/variants', 'ProductVariantsController@show');
        Route::post('product/{product}/variants', 'ProductVariantsController@store');

        Route::resource('variation', 'VariantStockController');

        Route::resource('customer', 'CustomerController');
        Route::resource('store', 'StoreController');

        Route::resource('roles', 'RoleController');
        Route::get('roles/{role}/permission', 'RolePermissionController@show');
        Route::post('roles/{role}/permission', 'RolePermissionController@update');

        Route::resource('permissions', 'PermissionController');
    });
});

Route::get('categories/by', 'Categories\CategoryController@by');
Route::resource('categories', 'Categories\CategoryController');

// Route::resource('popular', 'Categories\PopularController');

Route::resource('products', 'Products\ProductController');
Route::resource('addresses', 'Addresses\AddressController');
Route::resource('cities', 'Addresses\CityController');

Route::resource('countries', 'Countries\CountryController');

Route::resource('orders', 'Orders\OrderController');
Route::resource('payment-methods', 'PaymentMethods\PaymentMethodController');

Route::get('addresses/{address}/shipping', 'Addresses\AddressShippingController@action');

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Api\RegisterController@store');
    Route::post('login', 'Auth\LoginController@action');
    
    Route::post('logout', 'Auth\MeController@logout');
    Route::get('me', 'Auth\MeController@action');
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('upload/image', 'Uploads\ImageController@store');
});

Route::resource('cart', 'Cart\CartController', [
    'parameters' => [
        'cart' => 'productVariation'
    ]
]);


Route::get('test', function(){
    $category = App\Models\Category::find(1);

    dd($category->image);
});

// 


