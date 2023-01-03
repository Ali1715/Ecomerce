<?php

namespace App\Http\Controllers;

use App\Models\notaingreso;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductoController;
use App\Http\Requests\ProductoFormRequest;
use App\Http\Requests\StoreNotaIngresoRequest;
use App\Http\Requests\UpdateNotaIngresoRequest;
use App\Models\Bitacora;
use App\Models\detallenotaingreso;
use App\Models\productos;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class NotaingresoController extends Controller
{
    function __construct()
    {
        $this->middleware('can:notaIngreso.index', ['only' => 'index']);
        $this->middleware('can:notaIngreso.show', ['only' => 'show']);
        $this->middleware('can:notaIngreso.create', ['only' => ['create', 'store']]);
        $this->middleware('can:notaIngreso.update', ['only' => ['edit', 'update']]);
        $this->middleware('can:notaIngreso.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notasIng = notaingreso::paginate(10);
        $proveedores = Proveedor::get();
        $empleados = Persona::where('tipoe', 1)->get();
        return view('administrador.gestionar_notaingreso.index', compact('notasIng', 'proveedores', 'empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::get();
        return view('administrador.gestionar_notaingreso.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotaIngresoRequest $request)
    {
        notaingreso::create($request->validated());
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
        $action = "Creó una nueva nota de ingreso";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaIngreso.index')->with('mensaje', 'Nota Creada Con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $notaIng = notaingreso::findOrFail($id);
        $productos = producto::get();
        $detallesNotaIng = detallenotaingreso::where('idnotaing', $id)->paginate(10);
        return view('administrador.gestionar_detallenotaingreso.index', compact('productos', 'detallesNotaIng', 'notaIng'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaIng = notaingreso::findOrFail($id);
        $proveedores = Proveedor::get();
        $empleados = Persona::where('tipoe', 1)->get();
        return view('administrador.gestionar_notaingreso.edit', compact('notaIng', 'proveedores', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaIngresoRequest $request, $id)
    {
        $notaIng = notaingreso::findOrFail($id);
        $notaIng->update($request->validated());
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
        $action = "Actualizó un registro de una nota de ingreso";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaIngreso.index')->with('mensaje', 'Nota De Ingreso Actualizada Con Éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::capture();
        $notaIng = notaingreso::findOrFail($id);
        try {
            $notaIng->delete();
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
            $action = "Eliminó un registro de una nota de ingreso";
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
