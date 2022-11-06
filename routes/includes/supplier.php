<?php

use Illuminate\Support\Facades\Route;

Route::get('/supplier', 'SupplierController@index');
Route::post('/supplier', 'SupplierController@store');
Route::get('/supplier/data', 'SupplierController@data')->name('supplier.data');
Route::get('/supplier/{id}', 'SupplierController@show');
Route::post('/supplier/{id}', 'SupplierController@update');
Route::delete('/supplier/{id}', 'SupplierController@destroy');