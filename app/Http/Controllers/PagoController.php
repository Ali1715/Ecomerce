<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Models\AddressClient;
use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\factura;
use App\Models\Pedido;
use App\Models\Persona;
use App\Models\producto;
use App\Models\TipoPago;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('America/La_Paz');

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposPagos = TipoPago::get();
        $productos = producto::get();
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $detallesCarrito = DetalleCarrito::get();
        return view('cliente.metodoDePago.index', compact('tiposPagos', 'productos', 'carrito', 'detallesCarrito'));
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
     * @param  \App\Http\Requests\StorePagoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePagoRequest $request)
    {
        //Pago
        $pago = Pago::create($request->validated());
        //Pedido
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $pedido = Pedido::create([
            'fechaHora' => $request->fechaHora,
            'total' => $request->monto,
            'estado' => 'Pendiente',
            'id_carrito' => $carrito->id,
            'id_direccion' => $request->id_direccion,
            'id_pago' => $pago->id,
        ]);
        //Carrito
        $carrito->estado = 0;
        $carrito->save();
        Carrito::create([
            'fechaHora' => date('Y-m-d H:i:s'),
            'estado' => '1',
            'total' => '0',
            'idCliente' => auth()->user()->id,
        ]);
        //Factura
        factura::create([
            'fechaHora' => date('Y-m-d H:i:s'),
            'montoTotal' => $request->monto,
            'id_cliente' => auth()->user()->id,
            'id_pedido' => $pedido->id,
        ]);
        //Actiualizacion de stock
        $productos = producto::get();
        $detallesCarrito = DetalleCarrito::get()->where('idCarrito', $pedido->id_carrito);
        foreach ($detallesCarrito as $detalleCarrito) {
            foreach ($productos as $producto) {
                if ($detalleCarrito->idProducto == $producto->id) {
                    $prod = producto::findOrFail($producto->id);
                    $prod->stock = $prod->stock - $detalleCarrito->cantidad;
                    $prod->save();
                }
            }
        }
        //Bitacora Pago
        $id2 = Auth::id();
        $user = Persona::where('iduser', $id2)->first();
        $tipo = "default";
        if ($user->tipoe == 1) {
            $tipo = "Empleado";
        }
        if ($user->tipoc == 1) {
            $tipo = "Cliente";
        }
        $action = "Nuevo pago creado";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        //Bitacora pedido
        $action = "Nuevo pedido creado";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //Bitacora carrito
        $action = "Nuevo carrito creado y asignado";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //Bitacora factura
        $action = "Factura creada";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        return redirect('/home')->with('mensaje', 'Pedido realizado, Su transferencia será revisada dentro de 24 horas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoPago = TipoPago::findOrFail($id);
        $productos = producto::get();
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        $detallesCarrito = DetalleCarrito::get();
        $direcciones = AddressClient::get()->where('id_client', auth()->user()->id);
        return view('cliente.metodoDePago.create', compact('tipoPago', 'productos', 'carrito', 'detallesCarrito', 'direcciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePagoRequest  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
