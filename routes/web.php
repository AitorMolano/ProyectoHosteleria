<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EstadisticaController;
use App\Http\Controllers\PerfilController;

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

/*
----------------------------------------------
GENERAL
----------------------------------------------
*/
    Auth::routes();

    Route::get('/home', [ProductoController::class, 'index'])->name('home');

    Route::get('/', [ProductoController::class, 'index'])->name('home');

    Route::get('/api/productos', [ApiController::class, 'productos'])->name('api-productos'); 

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

/*
----------------------------------------------
PRODUCTOS
----------------------------------------------
 */

Route::get('producto/create', [ProductoController::class, 'create'])->middleware('auth')->name('createProduct');

Route::get('producto/{id}', [ProductoController::class, 'show'])->name('detalleProd');

Route::post('producto/store', [ProductoController::class, 'store'])->middleware('auth')->name('storeProduct');

Route::delete('producto/{id}', [ProductoController::class, 'destroy'])->middleware('auth')->name('borrarProducto');

Route::get('producto/{id}/edit', [ProductoController::class, 'edit'])->middleware('auth')->name('editProducto');

Route::put('editarProducto/{id}', [ProductoController::class, 'update'])->middleware('auth')->name('actualizar');


/*
----------------------------------------------
CARRITO
----------------------------------------------
 */


Route::get('carrito/index', [CarritoController::class, 'index'])->name('indexCarrito');

Route::get('carrito/show', [CarritoController::class, 'show'])->name('showCarrito');

Route::post('carrito/store', [CarritoController::class, 'store'])->name('storeCarrito');

Route::get('estadisticas', [EstadisticaController::class, 'index'])->name('indexEstadisticas');

Route::get('estadisticas/controller', [App\Http\Controllers\ApiController::class, 'obtenerEstadisticas']);

Route::post('carrito/store', [CarritoController::class, 'store'])->middleware('auth')->name('storeCarrito');

/*
----------------------------------------------
PEDIDO
----------------------------------------------
 */

Route::get('/pedidos', [PedidoController::class, 'index'])->middleware('auth')->name('pedidos');
Route::get('/pedidos-admin', [PedidoController::class, 'indexAdmin'])->middleware('auth')->name('pedidos-admin');

Route::get('/estado/{id}', [EstadoController::class, 'show'])->middleware('auth')->name('estado.show');

Route::post('/pedidos/admin', [EstadoController::class, 'update'])->middleware('auth')->name('pedidos.update'); 
/*
----------------------------------------------
PERFIL
----------------------------------------------
 */
Route::get('/perfil', [PerfilController::class, 'index'])->middleware('auth')->name('perfil');
Route::post('/perfil/store', [PerfilController::class, 'store'])->middleware('auth')->name('perfil.store');
