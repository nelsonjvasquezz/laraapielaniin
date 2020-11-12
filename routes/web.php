<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeControllerController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
 * Rutas para crud de productos
 */
Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])
    ->name('productos.show');
Route::get('/productos/create', [ProductoController::class, 'create'])
    ->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])
    ->name('productos.store');
