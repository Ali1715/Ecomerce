<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\DetalleCarritoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiProductoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/producto',ApiProductoController::class)->only(['index','store','update','destroy']) ;

Route::apiResource('/catalogo',CatalogoController::class)->only(['index','store','update','destroy']) ;

Route::apiResource('/detallecarrito',DetalleCarritoController::class)->only(['index','store','update','destroy']) ;

