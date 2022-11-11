<?php

use App\Sale;
use App\Product;
use App\Supplier;
use App\buy_transaction;
use Illuminate\Support\Facades\DB;
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
        $products = Product::get()->count();
        $suppliers = Supplier::get()->count();
        $cost = buy_transaction::sum('cost');
        $revenue = Sale::sum('total');
        return view('dashboard', [
            'title' => 'cihuy',
            'products' => $products,
            'suppliers' => $suppliers,
            'cost' => $cost,
            'revenue' => $revenue,
        ]);
    });


    require_once('includes/category.php');
    require_once('includes/supplier.php');
    require_once('includes/product.php');
    require_once('includes/buy_transaction.php');
    require_once('includes/sale.php');
});