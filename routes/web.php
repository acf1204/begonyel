<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

//bagian product
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::delete('/product/{productModel}', [ProductController::class, 'destroy']);
Route::patch('/product/{productModel}', [ProductController::class, 'update']);
Route::get('/product/{productModel}/edit', [ProductController::class, 'edit']);


//bagian table
Route::get('/table', [TableController::class, 'index']);
Route::get('/table/create', [TableController::class, 'create']);
Route::post('/table', [TableController::class, 'store']);//kirim data baru ke table index
Route::delete('/table/{tableModel}', [TableController::class, 'destroy']);
Route::get('/table/{tableModel}/edit', [TableController::class, 'edit']);
Route::patch('/table/{tableModel}', [TableController::class, 'update']);

//bagian order
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/create', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store']);
Route::delete('/order/{orderModel}', [OrderController::class, 'destroy']);
Route::get('/order/{orderModel}/edit', [OrderController::class, 'edit']);
Route::patch('/order/{orderModel}', [OrderController::class, 'update']);