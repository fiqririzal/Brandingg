<?php

use Illuminate\Support\Facades\Route;

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@store');
Route::get('/product/data', 'ProductController@data')->name('product.data');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product/{id}', 'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');