<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\DetalleCarritoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiProductoController;
use App\Http\Controllers\Api\ApiClienteController;
use App\Http\Controllers\Api\ApiCarritoController;
use App\Http\Controllers\Api\ApiUsuarioController;
use App\Http\Controllers\Api\ApiTipoPagoController;
use App\Http\Controllers\Api\ApiPagoController;
use App\Http\Controllers\Api\AuthController;

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


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('api.logout')
    ->middleware('auth:sanctum');

//Route::apiResource('/producto',ApiProductoController::class)->only(['index','store','update','destroy']) ;

Route::get('productos',[ApiProductoController::class,'index']);
Route::get('productos/{producto}',[ApiProductoController::class,'show']);
Route::post('productos',[ApiProductoController::class,'store']);
Route::put('productos/{producto}',[ApiProductoController::class,'update']);
Route::delete('productos/{producto}',[ApiProductoController::class,'destroy']);


Route::get('cliente',[ApiClienteController::class,'index']);
Route::get('cliente/{persona:id}',[ApiClienteController::class,'show']);
Route::post('cliente',[ApiClienteController::class,'store']);
Route::put('cliente/{cliente}',[ApiClienteController::class,'update']);
Route::delete('cliente/{cliente}',[ApiClienteController::class,'destroy']);


Route::get('carrito',[ApiCarritoController::class,'index']);
Route::get('carrito/{carrito}',[ApiCarritoController::class,'show']);
Route::post('carrito',[ApiCarritoController::class,'store']);
Route::put('carrito/{carrito}',[ApiCarritoController::class,'update']);
Route::delete('carrito/{carrito}',[ApiCarritoController::class,'destroy']);


Route::get('detallecarrito',[ApiDetalleCarritoController::class,'index']);
Route::get('detallecarrito/{detallecarrito}',[ApiDetalleCarritoController::class,'show']);
Route::post('detallecarrito',[ApiDetalleCarritoController::class,'store']);
Route::put('detallecarrito/{detallecarrito}',[ApiDetalleCarritoController::class,'update']);
Route::delete('detallecarrito/{detallecarrito}',[ApiDetalleCarritoController::class,'destroy']);


Route::get('usuario',[ApiUsuarioController::class,'index']);
Route::get('usuario/{usuario}',[ApiUsuarioController::class,'show']);
Route::post('usuario',[ApiUsuarioController::class,'store']);
Route::put('usuario/{usuario}',[ApiUsuarioController::class,'update']);
Route::delete('usuario/{usuario}',[ApiUsuarioController::class,'destroy']);


Route::get('tipopago',[ApiTipoPagoController::class,'index']);
Route::get('tipopago/{tipopago}',[ApiTipoPagoController::class,'show']);
Route::post('tipopago',[ApiTipoPagoController::class,'store']);
Route::put('tipopago/{tipopago}',[ApiTipoPagoController::class,'update']);
Route::delete('tipopago/{tipopago}',[ApiTipoPagoController::class,'destroy']);


Route::get('pago',[ApiPagoController::class,'index']);
Route::get('pago/{pago}',[ApiPagoController::class,'show']);
Route::post('pago',[ApiPagoController::class,'store']);
Route::put('pago/{pago}',[ApiPagoController::class,'update']);
Route::delete('pago/{pago}',[ApiPagoController::class,'destroy']);



