<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\categoria;
use App\Models\DetalleCarrito;
use App\Models\marca;
use App\Models\producto;
use App\Models\Promocion;
use Illuminate\Http\Request;

class CategoriaShowController extends Controller
{
    public function index()
    {
        $categoriasShow = categoria::paginate(10);
        if (auth()->user()) {
            $productos = producto::get();
            $carrito = Carrito::where('idCliente', auth()->user()->id);
            $carrito = $carrito->where('estado', 1)->first();
            $detallesCarrito = DetalleCarrito::get();
            return (view('cliente.categoria.index', compact('categoriasShow', 'productos', 'carrito', 'detallesCarrito')));
        } else {
            return (view('cliente.categoria.index', compact('categoriasShow')));
        }
    }

    public function show($id)
    {
        $productos = producto::get();
        $productosS = producto::where('idcategoria', $id)->paginate(9);
        $categoria = categoria::findOrFail($id);
        $marcas = marca::get();
        $promociones = Promocion::get();
        if (auth()->user()) {
            $carrito = Carrito::where('idCliente', auth()->user()->id);
            $carrito = $carrito->where('estado', 1)->first();
            $detallesCarrito = DetalleCarrito::get();
            return view('cliente.categoria.show', compact('productos', 'productosS', 'categoria', 'marcas', 'promociones', 'carrito', 'detallesCarrito'));
        }
        return view('cliente.categoria.show', compact('productos', 'productosS', 'categoria', 'marcas', 'promociones'));
    }
}
