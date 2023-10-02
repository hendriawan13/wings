<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::middleware('only_guest')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'authenticating']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logout']);

    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/', [ProductController::class, 'index']);
    Route::get('product-detail/{productCode}', [ProductController::class, 'productDetail']);

    Route::get('checkout', [ProductController::class, 'checkout']);
    Route::post('add-to-cart', [ProductController::class, 'addToCart'])->name('addToCart');
    Route::post('/update-cart', [ProductController::class, 'updateCart']);


    Route::post('confirm-transaction', [ProductController::class, 'confirmTransaction'])->name('confirmTransaction');
    Route::get('report', [ProductController::class, 'report']);
    Route::get('report-detail', [ProductController::class, 'reportDetail']);
});
