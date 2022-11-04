<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'guest',
], function() {
Route::get('/login','AuthController@view')->name('login');
Route::post('/login','AuthController@login');

});
Route::group([
    'middleware' => 'auth',
], function() {
    Route::get('/logout','AuthController@logout')->name('logout');
});


?>
