<?php

namespace App\Http\Controllers;

use App\Models\AddressClient;
use App\Http\Requests\StoreAddressClientRequest;
use App\Http\Requests\UpdateAddressClientRequest;
use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\Persona;
use App\Models\producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

date_default_timezone_set('America/La_Paz');

class AddressClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $productos = producto::get();
        $direcciones = AddressClient::where('id_client', $id)->paginate(10);
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $detallesCarrito = DetalleCarrito::get();
        return view('cliente.direcciones.index', compact('direcciones', 'detallesCarrito', 'carrito', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $productos = producto::get();
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $detallesCarrito = DetalleCarrito::get();
        return view('cliente.direcciones.create', compact('id', 'detallesCarrito', 'carrito', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAddressClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressClientRequest $request)
    {
        AddressClient::create($request->validated());
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
        $action = "Agregó una nueva dirección";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('AddressClient.index')->with('mensaje', 'Dirección Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddressClient  $addressClient
     * @return \Illuminate\Http\Response
     */
    public function show(AddressClient $addressClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddressClient  $addressClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccion = AddressClient::findOrFail($id);
        $productos = producto::get();
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $detallesCarrito = DetalleCarrito::get();
        return view('cliente.direcciones.edit', compact('direccion', 'carrito', 'detallesCarrito', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddressClientRequest  $request
     * @param  \App\Models\AddressClient  $addressClient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressClientRequest $request, $id)
    {
        $direccion = AddressClient::find($id);
        $direccion->update($request->validated());
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
        $action = "Actualización de dirección";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect()->route('AddressClient.index')->with('mensaje', 'Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddressClient  $addressClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = AddressClient::findOrFail($id);
        $request = Request::capture();
        try {
            $direccion->delete();
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
            $action = "Se eliminó una dirección";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //----------
            return redirect()->route('AddressClient.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('AddressClient.index')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
