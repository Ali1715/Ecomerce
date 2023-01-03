<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetalleNotaBajaRequest;
use App\Http\Requests\UpdateDetalleNotaBajaRequest;
use App\Models\Bitacora;
use App\Models\detallenotabaja;
use App\Models\notabaja;
use App\Models\Persona;
use App\Models\producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class DetallenotabajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetalleNotaBajaRequest $request)
    {
        $detalleNotaBaja = detallenotabaja::create($request->validated());
        $detalleNotaBaja->total = $detalleNotaBaja->cantidad * $detalleNotaBaja->costo;
        $detalleNotaBaja->save();
        $notaBaja = notabaja::findOrFail($detalleNotaBaja->idnotabaja);
        $notaBaja->total = $notaBaja->total + $detalleNotaBaja->total;
        $notaBaja->save();
        $producto = producto::findOrFail($detalleNotaBaja->idproducto);
        $producto->stock = $producto->stock - $detalleNotaBaja->cantidad;
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
        $action = "Se creó un registro de un detalle de nota de baja";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaBaja.index')->with('mensaje', 'Producto agregado a la nota de baja.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detallenotabaja  $detallenotabaja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notaBaja = notabaja::findOrFail($id);
        $productos = producto::get();
        return view('administrador.gestionar_detallenotabaja.create', compact('notaBaja', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detallenotabaja  $detallenotabaja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleNotaBaja = detallenotabaja::findOrFail($id);
        $productos = producto::get();
        return view('administrador.gestionar_detallenotabaja.edit', compact('detalleNotaBaja', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detallenotabaja  $detallenotabaja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalleNotaBajaRequest $request, $id)
    {
        $detalleNotaBaja = detallenotabaja::findOrFail($id);
        $producto = producto::findOrFail($detalleNotaBaja->idproducto);
        $producto->stock = $producto->stock + $detalleNotaBaja->cantidad;
        $producto->save();
        $notaBaja = notabaja::findOrFail($detalleNotaBaja->idnotabaja);
        $notaBaja->total = $notaBaja->total - $detalleNotaBaja->total;
        $notaBaja->save();
        $detalleNotaBaja->update($request->validated());
        $detalleNotaBaja->total = $detalleNotaBaja->cantidad * $detalleNotaBaja->costo;
        $detalleNotaBaja->save();
        $notaBaja->total = $notaBaja->total + $detalleNotaBaja->total;
        $notaBaja->save();
        $producto = producto::findOrFail($detalleNotaBaja->idproducto);
        $producto->stock = $producto->stock - $detalleNotaBaja->cantidad;
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
        $action = "Se actualizó el registro de un detalle de nota de baja";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaBaja.index')->with('mensaje', 'Detalle Actualizado Con Éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detallenotabaja  $detallenotabaja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::capture();
        $detalleNotaBaja = detallenotabaja::findOrFail($id);
        try {
            $notaBaja = notabaja::findOrFail($detalleNotaBaja->idnotabaja);
            $notaBaja->total = $notaBaja->total - $detalleNotaBaja->total;
            $notaBaja->save();
            $producto = producto::findOrFail($detalleNotaBaja->idproducto);
            $producto->stock = $producto->stock + $detalleNotaBaja->cantidad;
            $producto->save();
            $detalleNotaBaja->delete();
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
            $action = "Eliminó un registro de un detalle de nota de baja";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
            return redirect()->route('notaBaja.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('notaBaja.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
