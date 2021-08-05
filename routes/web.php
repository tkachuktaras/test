<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('admin-panel/products', 'ProductController@index')->name('products.index');
Route::get('admin-panel/product/create', 'ProductController@create')->name('product.create');
Route::get('admin-panel/product/show/{id}', 'ProductController@show')->name('product.show');
Route::post('admin-panel/product/store', 'ProductController@store')->name('product.store');

Route::get('admin-panel/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('admin-panel/product/update/{id}', 'ProductController@update')->name('product.update');
Route::post('admin-panel/product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');


Route::post('admin-panel/user-product/add', 'UserProductController@add')->name('user-product.add');
Route::post('admin-panel/user-product/destroy/{id}', 'UserProductController@destroy')->name('user-product.destroy');

Route::post('admin-panel/product-option/add', 'ProductOptionController@add')->name('product-option.add');
Route::post('admin-panel/product-option/destroy/{id}', 'ProductOptionController@destroy')->name('product-option.destroy');


Route::get('admin-panel/users', 'UserController@index')->name('users.index');
Route::get('admin-panel/user/create', 'UserController@create')->name('user.create');
Route::get('admin-panel/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::get('admin-panel/user/show/{id}', 'UserController@show')->name('user.show');

Route::post('admin-panel/user/store', 'UserController@store')->name('user.store');
Route::post('admin-panel/user/update/{id}', 'UserController@update')->name('user.update');
Route::post('admin-panel/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');