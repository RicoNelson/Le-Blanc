<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UpdateController;
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

// ALL
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/search', [SearchController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);

// ADMIN
// update product
Route::get('/update/{id}', [UpdateController::class, 'show'])->middleware('admin');
Route::post('/update/{id}', [UpdateController::class, 'store'])->middleware('admin');

Route::get('/insert', [ProductController::class, 'insertProductIndex'])->middleware('admin');
Route::post('/insert', [ProductController::class, 'store'])->middleware('admin');

Route::get('/detail-product/{id}', [ProductController::class, 'show']);
Route::post('/detail-product/{id}', [CartController::class, 'store'])->middleware('auth');

Route::get('/manage-user', [ManageUserController::class, 'index'])->middleware('admin');
Route::post('/manage-user/{id}', [ManageUserController::class, 'destroy'])->middleware('admin');

// CUSTOMER
Route::get('/cart', [CartController::class, 'show'])->middleware('customer');
Route::post('/cart', [CartController::class, 'destroy'])->middleware('customer');

Route::get('/transaction', [TransactionController::class, 'show'])->middleware('customer');
Route::post('/transaction-create', [TransactionController::class, 'store'])->middleware('customer');

Route::get('/detail_transaction/{id}', [DetailTransactionController::class, 'show'])->middleware('customer');

Route::get('/update-profile/{id}', [UpdateController::class, 'updateProfileIndex'])->middleware('customer');
Route::post('/update-profile/{id}', [UpdateController::class, 'updateProfileStore'])->middleware('customer');