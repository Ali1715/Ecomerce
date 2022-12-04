<?php

use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoCliente;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\AddressClientController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CierreSesionController;
use App\Http\Controllers\DetalleCarritoCliente;
use App\Http\Controllers\DetalleCarritoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TipoPagoController;

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

        Route::resource('/categoria', CategoriaController::class);

        //********************************* */ Route for Marca**************************************

        Route::resource('/marca', MarcaController::class);

        //********************************* */ Route for Producto**************************************

        Route::resource('/producto', ProductoController::class);

        //********************************* */ Route for Roles**************************************

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


Route::prefix('/cliente')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('cliente');
    //Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');
    Route::resource('/detalleCarrito', DetalleCarritoController::class);
    Route::resource('/pagos', PagoController::class);
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/AddressClient', AddressClientController::class);
    });
});

//Route::resource('/detalleCarrito', DetalleCarritoController::class);

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
    Route::resource('/administrador/gestionar_proveedores', ProveedorController::class);
    Route::resource('/administrador/carritosClientes', CarritoCliente::class);
    Route::resource('/administrador/detallesCarritosClientes', DetalleCarritoCliente::class);
    Route::get('/administrador/detallesCarritosClientes/{dato}/create2', [DetalleCarritoCliente::class, 'create2'])->name('detallesCarritosClientes.create2');
    Route::resource('/administrador/tiposPagos', TipoPagoController::class);
    Route::resource('/administrador/promociones', PromocionController::class);
    Route::resource('/administrador/pedidos', PedidoController::class);
});

Route::resource('/cliente/catalogo', CatalogoController::class);

Route::get('/index', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', [BotManController::class, "handle"]);
