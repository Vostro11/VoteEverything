<?php

Route::group(['middleware' => 'web', 'prefix' => 'operation', 'namespace' => 'Modules\Operation\Http\Controllers'], function()
{
    Route::get('/', 'OperationController@index');
});
