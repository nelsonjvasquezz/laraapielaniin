<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductoAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productos', [ProductoAPIController::class,
    'index']);

Route::get('productos/{id}', [ProductoAPIController::class,
    'show']);

Route::post('productos', [ProductoAPIController::class, 'store']);

Route::put('productos/{id}', [ProductoAPIController::class, 'update']);

Route::delete('productos/{id}', [ProductoAPIController::class, 'destroy']);
