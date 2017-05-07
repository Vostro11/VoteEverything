<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/object', 'namespace' => 'Modules\Object\Http\Controllers'], function()
{
    Route::get('/', 'ObjectController@index');
    Route::post('/store','ObjectController@store');
    Route::post('/store-attribute','ObjectController@store_attribute');
	Route::get('/{id}/edit','ObjectController@edit');
	Route::get('/create-attribute/{object_id}','ObjectController@create_attribute');
	Route::post('/update/{id}','ObjectController@update');
	Route::get('/delete/{id}','ObjectController@delete');
});
