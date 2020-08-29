<?php

Route::get('/', 'ProductController@index')->name('index');
Route::get('/home', 'ProductController@home')->name('index.home');

Route::get('/filter', 'Products\ProductController@index')->name('product.filter');

Route::get('/cart/checkout', 'PageController@cart')->name('checkout');

Route::get('/contacts', 'PageController@contact')->name('contact');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/stores', 'PageController@stores')->name('stores');

Route::get('/icons', 'ProductController@icons')->name('icons');
Route::get('/privacy', 'PrivacyController@index')->name('privacy');

Route::get('/currency', 'PageController@currency')->name('currency');

Route::get('discount', 'DiscountProductController@show')->name('discount');
Route::get('category', 'CategoryController@filter')->name('category.filter');
Route::get('category/{category}', 'CategoryController@index')->name('categoryshow');
// Route::get('app/category/{category}', 'CategoryController@index')->name('app.categoryshow');

Route::get('topseller', 'TopSellController@index')->name('topseller');
Route::get('products', 'ProductController@product')->name('product');

Route::get('vendors/{store}/show', 'VendorController@index')->name('vendors.show');

Route::get('/product/{product}/show', 'ProductController@show')->name('show.product');

Route::group(['prefix' => 'society', 'middleware' => ['auth', 'role:society|admin']], function(){
	
	Route::get('/{vue?}', 'HomeController@society')
		->where('vue', '[\/\w\.-]*');

});

//

Route::post('logout', 'Api\MeController@applogout')->name('applogout');
Route::post('user/logout', 'Api\MeController@logout')->name('userlogout');

//
Route::get('/cart/checkout/success', 'CheckoutController@success')->name('success');
Route::get('/cart/checkout/cancel', 'CheckoutController@cancel_order')->name('cancel');
Route::get('/cart/checkout/later', 'CheckoutController@pay_later')->name('later');


// App
Route::get('/app/product/{product}/show', 'AppProductController@show')->name('app.show');
Route::get('/app/category/{category}', 'AppProductController@category')->name('app.category');


Route::group(['prefix' => 'delivery', 'middleware' => ['auth', 'role:delivery|admin']], function(){
	
	Route::get('/{vue?}', 'DeliveryController@index')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'supplier', 'middleware' => ['auth', 'role:supplier|admin']], function(){
	
	Route::get('/{vue?}', 'HomeController@supplier')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'store', 'middleware' => ['auth', 'role:store|admin']], function(){
	
	Route::get('/{vue?}', 'HomeController@store')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
	
	Route::get('/{vue?}', 'HomeController@admin')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:customer|admin']], function(){
	
	Route::get('/{vue?}', 'HomeController@dashboard')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function(){

	Route::get('/{vue?}', 'HomeController@auth')
		->where('vue', '[\/\w\.-]*');

});