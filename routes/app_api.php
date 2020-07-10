<?php

Route::group(['middleware' => ['auth:api']], function(){
	
	Route::group(['prefix' => 'account'], function(){
		Route::get('me', 'Rest\MeController@action');
		Route::post('me', 'Rest\MeController@store');
		
		Route::post('logout', 'Rest\MeController@logout')->name('logout');

		Route::post('avatar', 'Rest\AvatarController@store');

		Route::post('password', 'Rest\PasswordController@store');
	});

	Route::group(['prefix' => 'customer', 'middleware' => 'role:customer'], function(){
		Route::resource('profile', 'Rest\CustomerController');
		Route::resource('orders', 'Rest\OrderController');
	});

	Route::group(['prefix' => 'store', 'middleware' => 'role:store|admin'], function(){
		Route::resource('store', 'Rest\StoreController');
		Route::resource('orders', 'Store\OrdersController');
		Route::resource('sales', 'Store\SaleController');
		Route::resource('account', 'Store\AccountController');
	});

	Route::group(['prefix' => 'supplier', 'middleware' => 'role:supplier'], function(){
		Route::resource('account', 'Supplier\AccountController');
		Route::resource('orders', 'Supplier\OrdersController');
	});

	Route::resource('ticket', 'Rest\TicketController');

	Route::resource('tick_types', 'Rest\TypeController');
	Route::resource('priority', 'Rest\PriorityController');

	Route::resource('transactions', 'Rest\TrackableController');

	Route::group(['prefix' => 'payment'], function(){
		Route::resource('transfer', 'Rest\TransferController');

		Route::post('transfer/confirm', 'Rest\TransferController@confirm');
	});

	Route::group(['prefix' => 'products'], function(){
		Route::get('wishlist', 'Rest\WishlistController@index');
		Route::post('wishlist', 'Rest\WishlistController@store');
		Route::post('wishlist/remove', 'Rest\WishlistController@destroy');
	});
	Route::group(['prefix' => 'products', 'middleware' => 'role:store|admin|supplier'], function(){
		Route::resource('product', 'Admin\ProductController');
		Route::resource('sale', 'Product\SaleController');

		Route::post('product/{product}/edit', 'Admin\ProductEditController@store');
		Route::post('image/remove', 'Admin\ImageController@destroy');

		Route::resource('categories', 'Rest\CategoryController');
		Route::post('upload/image', 'Uploads\ImageController@store');

		Route::post('/{product}/variations', 'Admin\ProductVariantsController@store');
		Route::post('/{product}/variations/edit', 'Admin\ProductVariantsController@update');
	});

	Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function(){
		Route::resource('summary', 'Admin\SummaryController');

		Route::resource('category', 'Admin\CategoryController');
		
		Route::get('users', 'Admin\UserController@index');
		Route::get('society', 'Admin\SocietyController@index');
		Route::get('society/filter', 'Admin\SocietyController@filter');

		Route::post('product/{product}/owner', 'Admin\ProductController@owner');

		Route::delete('society/{user}/delete', 'Admin\SocietyController@destroy');
		Route::post('society/{user}/update', 'Admin\SocietyController@update');

		Route::post('users/{user}', 'Admin\UserController@update');
		Route::delete('users/{user}', 'Admin\UserController@destroy');

		Route::get('category', 'Admin\CategoryController@index');
		Route::post('category/{category}', 'Admin\CategoryController@update');
		Route::delete('category/{category}', 'Admin\CategoryController@destroy');

		Route::resource('supplier', 'Admin\SupplierController');
		Route::resource('products', 'Admin\ProductsController');

		Route::post('store/{store}/commission', 'Admin\StoreController@commission');
		Route::post('store/{store}/approve', 'Admin\StoreController@approve');

		Route::resource('transfer', 'Admin\TransferController');

		Route::resource('shipping', 'Admin\ShippingController');
		Route::resource('city', 'Admin\PlaceController');

		Route::resource('roles', 'Admin\RoleController');
		Route::resource('permissions', 'Admin\PermissionController');

		Route::get('roles/{role}/permission', 'Admin\RolePermissionController@show');
		Route::post('roles/{role}/permission', 'Admin\RolePermissionController@update');
	});

	Route::group(['prefix' => 'sociaty', 'middleware' => 'role:society|admin'], function(){

		Route::resource('account', 'Agent\AccountController');

		Route::get('summary', 'Agent\SummaryController@index');

		Route::get('filter', 'Agent\AgentController@filter');

		Route::resource('sponsore', 'Agent\SponsorController');
		Route::resource('placement', 'Agent\PlacementController');

		Route::post('create', 'Agent\AgentController@store');
		Route::get('show', 'Agent\AgentController@show');
		Route::get('show/members', 'Agent\AgentController@agentsuuid');
		Route::get('show/{user}/members', 'Agent\AgentController@members');
		Route::get('sponsors', 'Agent\AgentController@sponsor');

	});
	
});