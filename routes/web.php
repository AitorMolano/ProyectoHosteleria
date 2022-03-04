<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;

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

Route::get('/', [ProductoController::class, 'index']);

Route::get('productos/{id}', [ProductoController::class, 'show'])->name('detalleProd');

Route::get('producto/create', [ProductoController::class, 'create'])->name('createProduct');

Route::post('producto/store', [ProductoController::class, 'store'])->name('storeProduct');

Auth::routes();

Route::get('home', [ProductoController::class, 'index'])->name('productos');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

