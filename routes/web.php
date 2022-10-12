<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/administrador')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'indexA'])->name('administrador');

    //Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');


    //********************************* */ Route for Producto**************************************

    Route::controller(App\Http\Controllers\ProductoController::class)->group(function () {

        Route::get('/producto', 'index');
        Route::get('/producto/create', 'create');
        Route::post('/producto/store', 'store');
        Route::get('/producto/{dato}/edit', 'edit');
        Route::put('/producto/{dato}', 'update');
        Route::get('/producto/{dato}/delete', 'destroy');
    });

    //********************************* */ Route for NotaIngreso**************************************

    Route::controller(App\Http\Controllers\NotaingresoController::class)->group(function () {

        Route::get('/notaingreso', 'index');
        Route::get('/notaingreso/create', 'create');
        Route::get('/notaingreso/agregar', 'agregar');
        Route::get('/notaingreso/{dato}/agregardetalle', 'agregardetalle');
        Route::post('/notaingreso/store', 'store');
        Route::get('/notaingreso/{dato}/edit', 'edit');
        Route::put('/notaingreso/{dato}', 'update');
        Route::get('/notaingreso/{dato}/delete', 'destroy');
    });



});


Route::prefix('/cliente')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'indexC'])->name('cliente');

    //Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');
});

Route::get('/registro', [RegistroController::class, 'show']);

Route::post('/registro', [RegistroController::class, 'register']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/administrador/empleados', EmpleadoController::class);
    Route::resource('/administrador/clientes', ClienteController::class);
    Route::resource('/perfil', PerfilController::class);
    Route::resource('/password', PasswordController::class);
    Route::resource('/administrador/bitacoras', BitacoraController::class);
});


