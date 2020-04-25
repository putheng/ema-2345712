<?php

Route::get('/', 'PageController@home');
Route::get('/filter', 'Products\ProductController@index')->name('product.filter');
Route::get('/product/show', 'PageController@product')->name('product');

Route::get('/cart/checkout', 'PageController@cart')->name('checkout');


Route::get('/discount', 'DiscountProductController@show')->name('discount');
Route::get('/contacts', 'PageController@contact')->name('contact');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/stores', 'PageController@stores')->name('stores');


Route::get('products', 'ProductController@index');

Route::get('/product/{product}/show', 'PageController@show')->name('show.product');

Route::group(['prefix' => 'society', 'middleware' => ['auth']], function(){
	
	Route::get('/{vue?}', 'HomeController@society')
		->where('vue', '[\/\w\.-]*');

});


Route::group(['prefix' => 'supplier', 'middleware' => ['auth']], function(){
	
	Route::get('/{vue?}', 'HomeController@supplier')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'store', 'middleware' => ['auth']], function(){
	
	Route::get('/{vue?}', 'HomeController@store')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
	
	Route::get('/{vue?}', 'HomeController@admin')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function(){
	
	Route::get('/{vue?}', 'HomeController@dashboard')
		->where('vue', '[\/\w\.-]*');

});

Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function(){

	Route::get('/{vue?}', 'HomeController@auth')
		->where('vue', '[\/\w\.-]*');

});