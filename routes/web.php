<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require_once('includes/auth.php');

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    require_once('includes/category.php');
    require_once('includes/supplier.php');
    require_once('includes/product.php');
    require_once('includes/sale.php');
});