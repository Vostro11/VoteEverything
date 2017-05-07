<?php

Route::group(['middleware' => 'web', 'prefix' => 'object', 'namespace' => 'Modules\Object\Http\Controllers'], function()
{
    Route::get('/', 'ObjectController@index');
});
