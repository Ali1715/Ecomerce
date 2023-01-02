<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use App\Http\Requests\StoreTipoPagoRequest;
use App\Http\Requests\UpdateTipoPagoRequest;
use App\Models\Bitacora;
use App\Models\Persona;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class TipoPagoController extends Controller
{
    function __construct()
    {
        $this->middleware('can:tiposPagos.index', ['only' => 'index']);
        $this->middleware('can:tiposPagos.create', ['only' => ['create', 'store']]);
        $this->middleware('can:tiposPagos.update', ['only' => ['edit', 'update']]);
        $this->middleware('can:tiposPagos.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposPagos = TipoPago::paginate(10);
        return view('administrador.gestionar_tipos_de_pagos.index', compact('tiposPagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.gestionar_tipos_de_pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoPagoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoPagoRequest $request)
    {
        $tipoPago = TipoPago::create($request->validated());
        if ($request->hasFile('qr')) {
            $file = $request->file('qr');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('public/img/', $filename);
            $tipoPago->qr = $filename;
        }
        $tipoPago->save();
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
        $action = "Creó un nuevo registro de tipo de pago";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect()->route('tiposPagos.index')->with('mensaje', 'Tipo De Pago Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPago $tipoPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoPago = TipoPago::findOrFail($id);
        return view('administrador.gestionar_tipos_de_pagos.edit', compact('tipoPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoPagoRequest  $request
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoPagoRequest $request, $id)
    {
        $tipoPago = TipoPago::findOrFail($id);
        $tipoPago->update($request->validated());
        if ($request->hasFile('qr')) {
            $file = $request->file('qr');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('public/img/', $filename);
            $tipoPago->qr = $filename;
        }
        $tipoPago->save();
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
        $action = "Editó un registro de tipo de pago";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect()->route('tiposPagos.index')->with('mensaje', 'Tipo De Pago Editado Con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPago  $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::capture();
        $tipoPago = TipoPago::findOrFail($id);
        try {
            $tipoPago->delete();
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
            $action = "Eliminó un registro de un tipo de pago";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
            return redirect()->route('tiposPagos.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('tiposPagos.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
