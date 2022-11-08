<?php


use Illuminate\Support\Facades\Route;

Route::get('/transaction', 'TransactionController@index');
// Route::get('/transaction/{id}', 'TransactionController@store');
Route::get('/transaction/{id}', 'TransactionController@data')->name('transaction.data');
Route::post('/transaction', 'TransactionController@store');
Route::delete('/transaction/{id}', 'TransactionController@destroy');
// Route::get('/transaction/{id}', 'TransactionController@show');
