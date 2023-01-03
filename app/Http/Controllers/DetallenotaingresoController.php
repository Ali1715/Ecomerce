<?php

namespace App\Http\Controllers;

use App\Models\detallenotaingreso;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Http\Controllers\ProductoController;
use App\Http\Requests\ProductoFormRequest;
use App\Http\Requests\StoreDetalleNotaIngresoRequest;
use App\Http\Requests\UpdateDetalleNotaIngresoRequest;
use App\Models\Bitacora;
use App\Models\detallenotabaja;
use App\Models\notaingreso;
use App\Models\Persona;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('America/La_Paz');

class DetallenotaingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $notaIng = notaingreso::findOrFail($id);
        $productos = producto::get();
        return view('administrador.gestionar_detallenotaingreso.create', compact('notaIng', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreDetalleNotaIngresoRequest $request)
    {
        $detalleNotaIng = detallenotaingreso::create($request->validated());
        $detalleNotaIng->total = $detalleNotaIng->cantidad * $detalleNotaIng->costo;
        $detalleNotaIng->save();
        $notaIng = notaingreso::findOrFail($detalleNotaIng->idnotaing);
        $notaIng->total = $notaIng->total + $detalleNotaIng->total;
        $notaIng->save();
        $producto = producto::findOrFail($detalleNotaIng->idproducto);
        $producto->stock = $producto->stock + $detalleNotaIng->cantidad;
        $producto->save();
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
        $action = "Se creó un registro de un detalle de nota de ingreso";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaIngreso.index')->with('mensaje', 'Producto agregado a la nota de ingreso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $detalleNotaIng = detallenotaingreso::findOrFail($id);
        $productos = producto::get();
        return view('administrador.gestionar_detallenotaingreso.edit', compact('detalleNotaIng', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateDetalleNotaIngresoRequest $request, $id)
    {
        $detalleNotaIng = detallenotaingreso::findOrFail($id);
        $producto = producto::findOrFail($detalleNotaIng->idproducto);
        $producto->stock = $producto->stock - $detalleNotaIng->cantidad;
        $producto->save();
        $notaIng = notaingreso::findOrFail($detalleNotaIng->idnotaing);
        $notaIng->total = $notaIng->total - $detalleNotaIng->total;
        $notaIng->save();
        $detalleNotaIng->update($request->validated());
        $detalleNotaIng->total = $detalleNotaIng->cantidad * $detalleNotaIng->costo;
        $detalleNotaIng->save();
        $notaIng->total = $notaIng->total + $detalleNotaIng->total;
        $notaIng->save();
        $producto = producto::findOrFail($detalleNotaIng->idproducto);
        $producto->stock = $producto->stock + $detalleNotaIng->cantidad;
        $producto->save();
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
        $action = "Se actualizó el registro de un detalle de nota de ingreso";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaIngreso.index')->with('mensaje', 'Detalle Actualizado Con Éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $request = Request::capture();
        $detalleNotaIng = detallenotaingreso::findOrFail($id);
        try {
            $notaIng = notaingreso::findOrFail($detalleNotaIng->idnotaing);
            $notaIng->total = $notaIng->total - $detalleNotaIng->total;
            $notaIng->save();
            $producto = producto::findOrFail($detalleNotaIng->idproducto);
            $producto->stock = $producto->stock - $detalleNotaIng->cantidad;
            $producto->save();
            $detalleNotaIng->delete();
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
            $action = "Eliminó un registro de un detalle de nota de ingreso";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
            return redirect()->route('notaIngreso.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('notaIngreso.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
