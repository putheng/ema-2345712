<?php
Route::get('/products/{product}/variations', 'Admin\ProductVariantsController@show');

Route::resource('cart', 'Cart\CartController', [
    'parameters' => [
        'cart' => 'productVariation'
    ]
]);

Route::get('categories', 'Api\CategoryController@index');

Route::post('webhook/incomming', 'Webhook\IncommingController@store');
Route::get('content', 'Webhook\IncommingController@content');
Route::get('content/continue', 'Webhook\IncommingController@continue')->name('continue');

Route::resource('payment-methods', 'PaymentMethods\PaymentMethodController');
Route::resource('orders', 'Orders\OrderController');
Route::resource('addresses', 'Addresses\AddressController');
Route::resource('cities', 'Addresses\CityController');
Route::resource('countries', 'Countries\CountryController');

Route::resource('discounts', 'Api\DiscountController');
Route::resource('newsletter', 'Api\NewsletterController');
Route::get('addresses/{address}/shipping', 'Addresses\AddressShippingController@action');

Route::resource('bast-sell', 'Api\BestSellController');

Route::group(['middleware' => 'auth'], function(){
	
	Route::group(['prefix' => 'account'], function(){
		Route::get('me', 'Api\MeController@action');
		Route::post('me', 'Api\MeController@store');
		
		Route::post('logout', 'Api\MeController@logout')->name('logout');

		Route::post('avatar', 'Api\AvatarController@store');

		Route::post('password', 'Api\PasswordController@store');
	});

	Route::group(['prefix' => 'delivery', 'middleware' => 'role:delivery|admin', 'namespace' => 'Delivery'], function(){
		Route::get('shipments', 'ShipmentController@index');
		Route::get('shipments/processing', 'ShipmentController@processing');
		Route::get('shipments/completed', 'ShipmentController@completed');
		
		Route::post('shipments/{order}', 'ShipmentController@update');
	});

	Route::group(['prefix' => 'customer', 'middleware' => 'role:customer'], function(){
		Route::resource('profile', 'Api\CustomerController');
	});

	Route::group(['prefix' => 'store', 'middleware' => 'role:store|admin'], function(){
		Route::resource('store', 'Api\StoreController');
		
		Route::resource('store/vat', 'Api\StoreController@show');

		Route::resource('orders', 'Store\OrdersController');
		Route::resource('sales', 'Store\SaleController');
		Route::resource('account', 'Store\AccountController');
	});

	Route::group(['prefix' => 'supplier', 'middleware' => 'role:supplier'], function(){
		Route::resource('account', 'Supplier\AccountController');
		Route::resource('orders', 'Supplier\OrdersController');
	});

	Route::resource('ticket', 'Api\TicketController');

	Route::resource('tick_types', 'Api\TypeController');
	Route::resource('priority', 'Api\PriorityController');

	Route::resource('transactions', 'Api\TrackableController');

	Route::group(['prefix' => 'payment'], function(){
		Route::resource('transfer', 'Api\TransferController');

		Route::post('transfer/confirm', 'Api\TransferController@confirm');
	});

	Route::group(['prefix' => 'products'], function(){
		Route::get('wishlist', 'Api\WishlistController@index');
		Route::post('wishlist', 'Api\WishlistController@store');
		Route::post('wishlist/remove', 'Api\WishlistController@destroy');
	});

	Route::group(['prefix' => 'products', 'middleware' => 'role:store|admin|supplier'], function(){
		Route::resource('product', 'Admin\ProductController');
		Route::resource('products', 'Admin\ProductsController');
		
		Route::resource('sale', 'Product\SaleController');

		Route::post('product/{product}/edit', 'Admin\ProductEditController@store');
		Route::post('image/remove', 'Admin\ImageController@destroy');

		Route::resource('categories', 'Api\CategoryController');
		Route::post('upload/image', 'Uploads\ImageController@store');

		Route::post('/{product}/variations', 'Admin\ProductVariantsController@store');
		Route::post('/{product}/variations/edit', 'Admin\ProductVariantsController@update');
		Route::post('/{product}/variations/stock', 'Admin\ProductVariantsController@update_stock');
	});

	Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function(){

		Route::post('discounted/{product}', 'Admin\DiscountedController@store');
		Route::post('bestsell/{product}', 'Admin\DiscountedController@bestsell');

		Route::get('drivers', 'Admin\DriverController@index');

		Route::post('drivers', 'Admin\DriverController@store');

		Route::resource('summary', 'Admin\SummaryController');

		Route::resource('category', 'Admin\CategoryController');

		Route::get('orders', 'Admin\OrderController@index');
		Route::get('orders/processing', 'Admin\OrderController@processing');
		Route::get('orders/completed', 'Admin\OrderController@completed');

		Route::post('orders/{order}', 'Admin\OrderController@update');
		
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

Route::group(['prefix' => 'auth', 'middleware' => ['guest']],function(){
	Route::post('login', 'Api\LoginController@login');
	Route::post('society', 'Api\SociaryLoginController@login');
	Route::post('society/register', 'Api\SociaryRegisterController@store');
	Route::post('register', 'Api\RegisterController@store');
});

