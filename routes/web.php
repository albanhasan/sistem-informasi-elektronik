<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ElectronicController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('logout', [LoginController::class, 'logout']);

Route::resource('products',  ProductController::class);

Route::resource('category',  CategoryController::class);

Route::resource('electronic',  ElectronicController::class);

Route::get('electronic.list', [ElectronicController::class, 'list'])->name('/electronic/list');

Route::resource('transactions',  TransactionController::class);

Route::get('transactions.buy', [TransactionController::class, 'buy'])->name('electronic.list');


Route::get('/alban', function () {
    return "sup";
});



Auth::routes(['register'=>TRUE]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
