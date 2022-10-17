<?php

use App\Http\Controllers\AccesoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CierreSesionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProveedorController;

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
    return redirect('/home');
});

Auth::routes();

//Route::resource('/administrador/roles', RoleController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/administrador')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('administrador');

        //Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');

        //********************************* */ Route for Category**************************************

        Route::controller(App\Http\Controllers\CategoriaController::class)->group(function () {
            Route::get('/categoria', 'index');
            Route::get('/categoria/create', 'create');
            Route::post('/categoria/store', 'store');
        });

        //********************************* */ Route for Marca**************************************

        Route::controller(App\Http\Controllers\MarcaController::class)->group(function () {
            Route::get('/marca', 'index');
            Route::get('/marca/create', 'create');
            Route::post('/marca/store', 'store');
        });

        //********************************* */ Route for Producto**************************************

        Route::controller(App\Http\Controllers\ProductoController::class)->group(function () {
            Route::get('/producto', 'index');
            Route::get('/producto/create', 'create');
            Route::post('/producto/store', 'store');
            Route::get('/producto/{dato}/edit', 'edit');
            Route::put('/producto/{dato}', 'update');
            Route::get('/producto/{dato}/delete', 'destroy');
            Route::get('/producto/{$dato}/actualizar', 'modificar');
        });

        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/create', [RoleController::class, 'store']);
        Route::get('/roles/edit/{user}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/edit/{user}', [RoleController::class, 'update'])->name('roles.update');

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

        //********************************* */ Route for DetallenotaIngreso**************************************

        Route::controller(App\Http\Controllers\DetallenotaingresoController::class)->group(function () {
            Route::get('/detallenotaingreso/{dato}/agregar', 'index');
            Route::get('/detallenotaingreso/{dato}/create', 'create');
            Route::get('/detallenotaingreso/create', 'create');
            Route::get('/detallenotaingreso/agregar', 'agregar');
            Route::get('/detallenotaingreso/{dato}/agregardetalle', 'agregardetalle');
            Route::post('/detallenotaingreso/store', 'store');
            Route::put('/detallenotaingreso/{idnota}{dato}/update', 'update');
            Route::get('/detallenotaingreso/{idnota}/listaproducto', 'listar');
            Route::get('/detallenotaingreso/{idnota}{idproducto}/add', 'add');
            Route::get('/detallenotaingreso/{dato}/delete', 'destroy');
        });
    });
});

Route::prefix('/cliente')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('cliente');

    //Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');
});

Route::get('/registro', [RegistroController::class, 'show']);
Route::post('/registro', [RegistroController::class, 'register']);

Route::get('/acceso', [AccesoController::class, 'show'])->name('acceso');
Route::post('/acceso', [AccesoController::class, 'login']);

Route::get('/cierreSesion', [CierreSesionController::class, 'logout']);

Route::get('/administrador/proveedor', [ProveedorController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/administrador/empleados', EmpleadoController::class);
    Route::resource('/administrador/clientes', ClienteController::class);
    Route::resource('/perfil', PerfilController::class);
    Route::resource('/password', PasswordController::class);
    Route::resource('/administrador/bitacoras', BitacoraController::class);
    Route::resource('/administrador/proveedor', ProveedorController::class);
});
