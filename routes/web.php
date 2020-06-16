<?php

Route::get('/', 'ProductController@index')->name('index');

Route::get('/filter', 'Products\ProductController@index')->name('product.filter');

Route::get('/cart/checkout', 'PageController@cart')->name('checkout');

response()->json();

Route::get('/contacts', 'PageController@contact')->name('contact');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/stores', 'PageController@stores')->name('stores');

Route::get('/icons', 'ProductController@icons')->name('icons');

Route::get('/currency', 'PageController@currency')->name('currency');

Route::get('discount', 'DiscountProductController@show')->name('discount');
Route::get('category', 'CategoryController@filter')->name('category.filter');
Route::get('category/{category}', 'CategoryController@index')->name('categoryshow');

Route::get('topseller', 'TopSellController@index')->name('topseller');
Route::get('products', 'ProductController@product')->name('product');

Route::get('vendors/{store}/show', 'VendorController@index')->name('vendors.show');

Route::get('/product/{product}/show', 'ProductController@show')->name('show.product');

Route::group(['prefix' => 'society', 'middleware' => ['auth', 'role:society|admin']], function(){
	
	Route::get('/{vue?}', 'HomeController@society')
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