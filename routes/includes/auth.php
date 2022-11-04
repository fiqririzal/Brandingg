<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'guest',
], function() {
Route::get('/login','AuthController@view')->name('login');
Route::post('/login','AuthController@login');
Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/register', 'AuthController@postRegister');

});
Route::group([
    'middleware' => 'auth',
], function() {
    Route::get('/logout','AuthController@logout')->name('logout');
});


?>
