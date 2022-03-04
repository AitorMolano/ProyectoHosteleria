<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
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

Route::get('/', [ProductoController::class, 'index'])->name('home');
Route::get('/api/productos', [ApiController::class, 'productos'])->name('api-productos');
Route::post('/prueba', [ProductoController::class, 'prueba'])->name('prueba');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('producto/create', [ProductoController::class, 'create'])->name('createProduct');
Route::post('producto/store', [ProductoController::class, 'store'])->name('storeProduct');

Route::get('carrito/index', [CarritoController::class, 'index'])->name('indexCarrito');
Route::get('carrito/show', [CarritoController::class, 'show'])->name('showCarrito');

