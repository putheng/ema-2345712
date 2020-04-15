<?php
Route::get('/products/{product}/variations', 'Admin\ProductVariantsController@show');

Route::resource('cart', 'Cart\CartController', [
    'parameters' => [
        'cart' => 'productVariation'
    ]
]);
Route::resource('payment-methods', 'PaymentMethods\PaymentMethodController');
Route::resource('orders', 'Orders\OrderController');

Route::group(['middleware' => 'auth'], function(){
	
	Route::group(['prefix' => 'account'], function(){
		Route::get('me', 'Api\MeController@action');
		Route::post('me', 'Api\MeController@store');
		
		Route::post('logout', 'Api\MeController@logout');

		Route::post('avatar', 'Api\AvatarController@store');

		Route::post('password', 'Api\PasswordController@store');
	});

	Route::group(['prefix' => 'store'], function(){
		Route::post('store', 'Api\StoreController@store');
		Route::get('store', 'Api\StoreController@index');
	});

	Route::group(['prefix' => 'payment'], function(){
		Route::resource('transfer', 'Api\TransferController');
		Route::post('transfer/confirm', 'Api\TransferController@confirm');
	});

	Route::group(['prefix' => 'products'], function(){
		Route::resource('product', 'Admin\ProductController');

		Route::post('product/{product}/edit', 'Admin\ProductEditController@store');
		Route::post('image/remove', 'Admin\ImageController@destroy');

		Route::resource('categories', 'Api\CategoryController');
		Route::post('upload/image', 'Uploads\ImageController@store');

		Route::post('/{product}/variations', 'Admin\ProductVariantsController@store');
	});

	Route::group(['prefix' => 'admin'], function(){
		Route::post('category', 'Admin\CategoryController@store');
		Route::get('category', 'Admin\CategoryController@index');
		Route::post('category/{category}', 'Admin\CategoryController@update');

		Route::resource('roles', 'Admin\RoleController');
		Route::resource('permissions', 'Admin\PermissionController');

		Route::get('roles/{role}/permission', 'Admin\RolePermissionController@show');
		Route::post('roles/{role}/permission', 'Admin\RolePermissionController@update');
	});

	Route::group(['prefix' => 'sociaty'], function(){

		Route::get('filter', 'Agent\AgentController@filter');

		Route::post('create', 'Agent\AgentController@store');
		Route::get('show', 'Agent\AgentController@show');
		Route::get('show/{user}/members', 'Agent\AgentController@members');

	});
	
});

Route::group(['prefix' => 'auth', 'middleware' => ['guest'], 'namespace' => 'Api'],function(){
	Route::post('login', 'LoginController@login');
	// Route::post('register', 'RegisterController@store');
});