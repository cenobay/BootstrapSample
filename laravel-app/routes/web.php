<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('product.index');
// });
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store']);
