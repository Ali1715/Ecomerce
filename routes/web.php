<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoCliente;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpamController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\NotabajaController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SegmentoController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\PromoMailController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\DetalleCarritoCliente;
use App\Http\Controllers\NotaingresoController;
use App\Http\Controllers\CierreSesionController;
use App\Http\Controllers\AddressClientController;
use App\Http\Controllers\CategoriaShowController;
use App\Http\Controllers\PedidoClienteController;
use App\Http\Controllers\DetalleCarritoController;
use App\Http\Controllers\DetallenotabajaController;
use App\Http\Controllers\DetallenotaingresoController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/administrador')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/create', [RoleController::class, 'store']);
        Route::get('/roles/edit/{user}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/edit/{user}', [RoleController::class, 'update'])->name('roles.update');
    });
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/create', [RoleController::class, 'store']);
    Route::get('/roles/edit/{user}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/edit/{user}', [RoleController::class, 'update'])->name('roles.update');

    Route::get('/segmentos', [SegmentoController::class, 'index'])->name('segmentos.index');
    Route::get('/segmentos/create', [SegmentoController::class, 'create'])->name('segmentos.create');
    Route::post('/segmentos/create', [SegmentoController::class, 'store']);
    Route::get('/segmentos/edit/{segmento}', [SegmentoController::class, 'edit'])->name('segmentos.edit');
    Route::put('/segmentos/edit/{segmento}', [SegmentoController::class, 'update'])->name('segmentos.update');

    Route::get('/spam', [SpamController::class, 'index'])->name('spam.index');
    Route::post('/spam', [SpamController::class, 'store'])->name('spam.create');

    Route::get('/reportes/producto/{data}', [ReporteController::class, 'producto'])->name(('reportes.producto'));
    Route::get('/reportes/proveedor/{data}', [ReporteController::class, 'proveedor'])->name(('reportes.proveedor'));
});

Route::prefix('/cliente')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('cliente');
    Route::resource('/categoriaShow', CategoriaShowController::class);
    Route::resource('/catalogo', CatalogoController::class);
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/AddressClient', AddressClientController::class);
        Route::resource('/detalleCarrito', DetalleCarritoController::class);
        Route::resource('/pagos', PagoController::class);
        Route::resource('/pedidosCliente', PedidoClienteController::class);
    });
});

Route::get('/registro', [RegistroController::class, 'show']);
Route::post('/registro', [RegistroController::class, 'register']);

Route::get('/acceso', [AccesoController::class, 'show'])->name('acceso');
Route::post('/acceso', [AccesoController::class, 'login']);

Route::get('/cierreSesion', [CierreSesionController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/administrador/empleados', EmpleadoController::class);
    Route::resource('/administrador/clientes', ClienteController::class);
    Route::resource('/perfil', PerfilController::class);
    Route::resource('/password', PasswordController::class);
    Route::resource('/administrador/bitacoras', BitacoraController::class);
    Route::resource('/administrador/proveedor', ProveedorController::class);
    Route::resource('/administrador/carritosClientes', CarritoCliente::class);
    Route::resource('/administrador/detallesCarritosClientes', DetalleCarritoCliente::class);
    Route::get('/administrador/detallesCarritosClientes/{dato}/create2', [DetalleCarritoCliente::class, 'create2'])->name('detallesCarritosClientes.create2');
    Route::resource('/administrador/tiposPagos', TipoPagoController::class);
    Route::resource('/administrador/promociones', PromocionController::class);
    Route::resource('/administrador/pedidos', PedidoController::class);
    Route::resource('/administrador/notaIngreso', NotaingresoController::class);
    Route::resource('/administrador/detalleNotaIngreso', DetallenotaingresoController::class);
    Route::resource('/administrador/categoria', CategoriaController::class);
    Route::resource('/administrador/producto', ProductoController::class);
    Route::resource('/administrador/marca', MarcaController::class);
    Route::get('/administrador/home', [App\Http\Controllers\HomeController::class, 'index'])->name('administrador');
    Route::resource('/administrador/notaBaja', NotabajaController::class);
    Route::resource('/administrador/detalleNotaBaja', DetallenotabajaController::class);
    Route::resource('/administrador/promoMail', PromoMailController::class);
});

Route::get('/index', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', [BotManController::class, "handle"]);
