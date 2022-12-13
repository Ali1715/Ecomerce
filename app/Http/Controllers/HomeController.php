<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\categoria;
use App\Models\DetalleCarrito;
use App\Models\marca;
use App\Models\Persona;
use App\Models\producto;
use App\Models\Promocion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()) {
            $user = Persona::where('email', auth()->user()->email)->first();
            if ($user->tipoe == 1) {
                return view('administrador.home');
            }
        }
        $productos = producto::get();
        $categorias = categoria::get();
        $marcas = marca::get();
        $promociones = Promocion::get();
        if (auth()->user()) {
            $carrito = Carrito::where('idCliente', auth()->user()->id);
            $carrito = $carrito->where('estado', 1)->first();
            $detallesCarrito = DetalleCarrito::get();
            return view('cliente.home', compact('productos', 'categorias', 'marcas', 'promociones', 'carrito', 'detallesCarrito'));
        }
        return view('cliente.home', compact('productos', 'categorias', 'marcas', 'promociones'));
        //return view('home');
    }

    public function indexA()
    {
        return view('administrador.home');
    }
    public function indexC()
    {
        return view('cliente.home');
    }
}
