<?php

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('agent/store', 'Agent\AgentController@store');
    Route::get('agent/show', 'Agent\AgentController@show');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
        
        Route::resource('product', 'ProductController');
        Route::resource('category', 'CategoryController');
        Route::get('product/{product}/variants', 'ProductVariantsController@show');
        Route::post('product/{product}/variants', 'ProductVariantsController@store');

        Route::resource('variation', 'VariantStockController');

        Route::resource('customer', 'CustomerController');
    });
});

Route::resource('categories', 'Categories\CategoryController');
Route::resource('products', 'Products\ProductController');
Route::resource('addresses', 'Addresses\AddressController');
Route::resource('cities', 'Addresses\CityController');

Route::resource('countries', 'Countries\CountryController');

Route::resource('orders', 'Orders\OrderController');
Route::resource('payment-methods', 'PaymentMethods\PaymentMethodController');

Route::get('addresses/{address}/shipping', 'Addresses\AddressShippingController@action');

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Auth\RegisterController@action');
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

});