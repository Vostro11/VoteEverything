<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/category', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::get('/', 'CategoryController@index');
    Route::post('/store','CategoryController@store');
    Route::post('/store-tag','CategoryController@store_tag');
	Route::get('/{id}/edit','CategoryController@edit');
	//Route::get('/{id}','CategoryController@show');
	Route::post('/update/{id}','CategoryController@update');
	Route::get('/delete/{id}','CategoryController@delete');

});




Route::group(['middleware' => 'web', 'prefix' => 'admin/tag', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
	Route::get('/', 'TagController@index');
    Route::post('/store','TagController@store');
	Route::get('/{id}/edit','TagController@edit');
	//Route::get('/{id}','TagController@show');
	Route::post('/update/{id}','TagController@update');
	Route::get('/delete/{id}','TagController@delete');
});
