<?php

namespace App\Http\Controllers;

use App\Models\DetalleCarrito;
use App\Http\Requests\StoreDetalleCarritoRequest;
use App\Http\Requests\UpdateDetalleCarritoRequest;
use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\categoria;
use App\Models\marca;
use App\Models\Persona;
use App\Models\producto;
use App\Models\Promocion;
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
        $promociones = Promocion::get();
        return view('cliente.carrito.carrito', compact('productos', 'carrito', 'detallesCarrito', 'categorias', 'marcas', 'promociones'));
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
                    //Bitacora
                    $id2 = Auth::id();
                    $user = Persona::where('iduser', $id2)->first();
                    $tipo = "default";
                    if ($user->tipoe == 1) {
                        $tipo = "Empleado";
                    }
                    if ($user->tipoc == 1) {
                        $tipo = "Cliente";
                    }
                    $action = "Agregó un producto a su carrito";
                    $bitacora = Bitacora::create();
                    $bitacora->tipou = $tipo;
                    $bitacora->name = $user->name;
                    $bitacora->actividad = $action;
                    $bitacora->fechaHora = date('Y-m-d H:i:s');
                    $bitacora->ip = $request->ip();
                    $bitacora->save();
                    //----------
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
            //Bitacora
            $id2 = Auth::id();
            $user = Persona::where('iduser', $id2)->first();
            $tipo = "default";
            if ($user->tipoe == 1) {
                $tipo = "Empleado";
            }
            if ($user->tipoc == 1) {
                $tipo = "Cliente";
            }
            $action = "Agregó un producto a su carrito";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
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
            //Bitacora
            $id2 = Auth::id();
            $user = Persona::where('iduser', $id2)->first();
            $tipo = "default";
            if ($user->tipoe == 1) {
                $tipo = "Empleado";
            }
            if ($user->tipoc == 1) {
                $tipo = "Cliente";
            }
            $action = "Edito los productos de su carrito";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
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
        $request = Request::capture();
        $detalleCarrito = DetalleCarrito::findOrFail($id);
        try {
            $detalleCarrito = DetalleCarrito::findOrFail($id);
            $carrito = Carrito::findOrFail($detalleCarrito->idCarrito);
            $detalleCarrito->delete();
            $detalles = DetalleCarrito::get();
            $carrito->total = 0;
            foreach ($detalles as $detalle) {
                if ($detalle->idCarrito == $carrito->id) {
                    $carrito->total = ($carrito->total + $detalle->cantidad * $detalle->precio);
                }
            }
            $carrito->fechaHora = date('Y-m-d H:i:s');
            $carrito->save();
            //Bitacora
            $id2 = Auth::id();
            $user = Persona::where('iduser', $id2)->first();
            $tipo = "default";
            if ($user->tipoe == 1) {
                $tipo = "Empleado";
            }
            if ($user->tipoc == 1) {
                $tipo = "Cliente";
            }
            $action = "Eliminó un producto de su carrito";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
            return redirect('cliente/detalleCarrito')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect('cliente/detalleCarrito')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
