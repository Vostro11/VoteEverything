<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/object', 'namespace' => 'Modules\Object\Http\Controllers'], function()
{
    Route::get('/', 'ObjectController@index');
    Route::post('/store','ObjectController@store');
	Route::get('/{id}/edit','ObjectController@edit');
	//Route::get('/{id}','ObjectController@show');
	Route::post('/update/{id}','ObjectController@update');
	Route::get('/delete/{id}','ObjectController@delete');
});
