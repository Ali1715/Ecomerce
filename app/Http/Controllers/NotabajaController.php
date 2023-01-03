<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaBajaRequest;
use App\Http\Requests\UpdateNotaBajaRequest;
use App\Models\Bitacora;
use App\Models\detallenotabaja;
use App\Models\notabaja;
use App\Models\Persona;
use App\Models\producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('America/La_Paz');

class NotabajaController extends Controller
{
    function __construct()
    {
        $this->middleware('can:notaBaja.index', ['only' => 'index']);
        $this->middleware('can:notaBaja.show', ['only' => 'show']);
        $this->middleware('can:notaBaja.create', ['only' => 'store']);
        $this->middleware('can:notaBaja.update', ['only' => ['edit', 'update']]);
        $this->middleware('can:notaBaja.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notasBaja = notabaja::paginate(10);
        $empleados = Persona::where('tipoe', 1)->get();
        return view('administrador.gestionar_notabaja.index', compact('notasBaja', 'empleados'));
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
    public function store(StoreNotaBajaRequest $request)
    {
        notabaja::create($request->validated());
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
        $action = "Cre+o una nueva nota de baja";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaBaja.index')->with('mensaje', 'Nota De Baja Creada Con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notabaja  $notabaja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notaBaja = notabaja::findOrFail($id);
        $productos = producto::get();
        $detallesNotaBaja = detallenotabaja::where('idnotabaja', $id)->paginate(10);
        return view('administrador.gestionar_detallenotabaja.index', compact('productos', 'detallesNotaBaja', 'notaBaja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notabaja  $notabaja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaBaja = notabaja::findOrFail($id);
        $empleados = Persona::where('tipoe', 1)->get();
        return view('administrador.gestionar_notabaja.edit', compact('empleados', 'notaBaja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notabaja  $notabaja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotaBajaRequest $request, $id)
    {
        $notaBaja = notabaja::findOrFail($id);
        $notaBaja->update($request->validated());
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
        $action = "Actualizó un registro de una nota de baja";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('notaBaja.index')->with('mensaje', 'Nota De Baja Actualizada Con Éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notabaja  $notabaja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::capture();
        $notaBaja = notabaja::findOrFail($id);
        try {
            $notaBaja->delete();
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
            $action = "Eliminó un registro de una nota de baja";
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
