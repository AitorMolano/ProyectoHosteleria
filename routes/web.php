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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [ProductoController::class, 'index'])->name('productos');
Route::post('/prueba', [ProductoController::class, 'prueba'])->name('prueba');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('producto/create', [ProductoController::class, 'create'])->name('createProduct');
Route::post('producto/store', [ProductoController::class, 'store'])->name('storeProduct');