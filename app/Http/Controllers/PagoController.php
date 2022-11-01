<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\producto;
use App\Models\TipoPago;

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
        Pago::create($request->validated());
        return redirect('/home')->with('mensaje', 'Su transferencia será revisada dentro de 24 horas');
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
        return view('cliente.metodoDePago.create', compact('tipoPago', 'productos', 'carrito', 'detallesCarrito'));
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
