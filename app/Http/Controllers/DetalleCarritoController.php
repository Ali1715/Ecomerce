<?php

namespace App\Http\Controllers;

use App\Models\DetalleCarrito;
use App\Http\Requests\StoreDetalleCarritoRequest;
use App\Http\Requests\UpdateDetalleCarritoRequest;
use App\Models\Carrito;
use App\Models\categoria;
use App\Models\marca;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

date_default_timezone_set('America/La_Paz');

class DetalleCarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categoria::get();
        $marcas = marca::get();
        $productos = producto::get();
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $detallesCarrito = DetalleCarrito::where('idCarrito', $carrito->id)->paginate(9);
        return view('cliente.carrito.carrito', compact('productos', 'carrito', 'detallesCarrito', 'categorias', 'marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetalleCarritoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = producto::findOrFail($request->idProducto);
        $carrito = Carrito::findOrFail($request->idCarrito);
        $detallesC = DetalleCarrito::get();
        foreach ($detallesC as $detalleC) {
            if ($producto->id == $detalleC->idProducto && $carrito->id == $detalleC->idCarrito) {
                if ($producto->stock >= $request->cantidad && $detalleC->cantidad + $request->cantidad <= $producto->stock) {
                    $detalleC->cantidad = $detalleC->cantidad + $request->cantidad;
                    $detalleC->update();
                    $detalles = DetalleCarrito::get()->where('idCarrito', $carrito->id);
                    $carrito->total = 0;
                    foreach ($detalles as $detalle) {
                        $carrito->total = $carrito->total + $detalle->cantidad * $detalle->precio;
                    }
                    $carrito->fechaHora = date('Y-m-d H:i:s');
                    $carrito->save();
                    return redirect('cliente/catalogo')->with('message', 'Producto agregado exitosamente');
                } else {
                    return redirect('cliente/catalogo')->with('danger', 'Producto sin stock suficiente');
                }
            }
        }
        if ($producto->stock >= $request->cantidad) {
            $detalleCarrito = DetalleCarrito::create($request->all());
            $carrito->total = $carrito->total + $detalleCarrito->cantidad * $detalleCarrito->precio;
            $carrito->fechaHora = date('Y-m-d H:i:s');
            $carrito->save();
            return redirect('cliente/catalogo')->with('message', 'Producto agregado exitosamente');
        } else {
            return redirect('cliente/catalogo')->with('danger', 'Producto sin stock suficiente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleCarrito  $detalleCarrito
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleCarrito $detalleCarrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleCarrito  $detalleCarrito
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleCarrito $detalleCarrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetalleCarritoRequest  $request
     * @param  \App\Models\DetalleCarrito  $detalleCarrito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalleCarritoRequest $request, $id)
    {
        $producto = producto::findOrFail($request->idProducto);
        $carrito = Carrito::findOrFail($request->idCarrito);
        $detalleCarrito = DetalleCarrito::findOrFail($id);
        if ($producto->stock >= $request->cantidad && $request->cantidad > 0) {
            $detalleCarrito->cantidad = $request->cantidad;
            $detalleCarrito->update();
            $detalles = DetalleCarrito::get()->where('idCarrito', $detalleCarrito->idCarrito);
            $carrito->total = 0;
            foreach ($detalles as $detalle) {
                $carrito->total = ($carrito->total + $detalle->cantidad * $detalle->precio);
            }
            $carrito->fechaHora = date('Y-m-d H:i:s');
            $carrito->save();
            return redirect('cliente/detalleCarrito')->with('message', 'Producto actualizado exitosamente');
        } else {
            return redirect('cliente/detalleCarrito')->with('danger', 'Producto sin stock suficiente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleCarrito  $detalleCarrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleCarrito = DetalleCarrito::findOrFail($id);
        try {
            $detalleCarrito = DetalleCarrito::findOrFail($id);
            $carrito = Carrito::findOrFail($detalleCarrito->idCarrito);
            $detalles = DetalleCarrito::get()->where('idCarrito', $detalleCarrito->idCarrito);
            $detalleCarrito->delete();
            $carrito->total = 0;
            foreach ($detalles as $detalle) {
                $carrito->total = ($carrito->total + $detalle->cantidad * $detalle->precio);
            }
            $carrito->fechaHora = date('Y-m-d H:i:s');
            $carrito->save();
            return redirect('cliente/detalleCarrito')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect('cliente/detalleCarrito')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
