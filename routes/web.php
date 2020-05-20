<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Frontend\ProductController@index')->name('products.index');

Route::group(['prefix' => 'products'], function () {
		Route::get('/create', 'Frontend\ProductController@create')->name('products.create');
		Route::post('/store', 'Frontend\ProductController@store')->name('products.store');
		Route::get('/{id}', 'Frontend\ProductController@show')->name('product.show');
		Route::get('/{id}/edit', 'Frontend\ProductController@edit')->name('product.edit');
		Route::post('/{id}/update', 'Frontend\ProductController@update')->name('product.update');
		Route::get('/{id}/delete', 'Frontend\ProductController@delete')->name('product.delete');
});
Route::group(['prefix' => 'product-attribute'], function () {
		Route::get('/{id}/delete', 'Frontend\ProductAttributeController@delete');
		Route::post('/store', 'Frontend\ProductAttributeController@store')->name('attributes.store');
});