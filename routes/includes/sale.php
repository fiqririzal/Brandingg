<?php

use Illuminate\Support\Facades\Route;

Route::get('/sale', 'SaleController@index');
Route::post('/sale', 'SaleController@store');
Route::get('/sale/data', 'SaleController@data')->name('sale.data');
Route::get('/sale/{id}', 'SaleController@show');
Route::post('/sale/{id}', 'SaleController@update');
Route::delete('/sale/{id}', 'SaleController@destroy');