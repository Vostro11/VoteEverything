<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/category', 'namespace' => 'Modules\Category\Http\Controllers'], function()
{
    Route::get('/', 'CategoryController@index');
    Route::post('/store','CategoryController@store');
	Route::get('/{id}/edit','CategoryController@edit');
	//Route::get('/{id}','CategoryController@show');
	Route::post('/update/{id}','CategoryController@update');
	Route::get('/delete/{id}','CategoryController@delete');
});
