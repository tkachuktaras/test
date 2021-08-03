<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('admin-panel/products', 'ProductController@index')->name('products.index');
Route::get('admin-panel/product/create', 'ProductController@create')->name('product.create');
Route::get('admin-panel/product/{product}/show', 'ProductController@show')->name('product.show');
Route::post('admin-panel/product/store', 'ProductController@store')->name('product.store');

Route::get('admin-panel/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::post('admin-panel/product/{product}/update', 'ProductController@update')->name('product.update');
Route::post('admin-panel/product/{product}/destroy', 'ProductController@destroy')->name('product.destroy');

Route::post('admin-panel/user-product/update', 'UserProductController@update')->name('user-product.update');




Route::get('admin-panel/users', 'UserController@index')->name('users.index');
Route::get('admin-panel/user/create', 'UserController@create')->name('user.create');
Route::get('admin-panel/user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::get('admin-panel/user/{user}/show', 'UserController@show')->name('user.show');

Route::post('admin-panel/user/store', 'UserController@store')->name('user.store');
Route::post('admin-panel/user/{user}/update', 'UserController@update')->name('user.update');
Route::post('admin-panel/user/{user}/destroy', 'UserController@destroy')->name('user.destroy');