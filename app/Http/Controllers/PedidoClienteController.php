<?php

namespace App\Http\Controllers;

use App\Models\AddressClient;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\factura;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\producto;
use App\Models\TipoPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesCarrito = DetalleCarrito::get();
        $productos = producto::get();
        $carritos = Carrito::where('idCliente', auth()->user()->id)->paginate(10);
        $pedidos = Pedido::get();
        return (view('cliente.pedidos.index', compact('pedidos', 'carritos', 'detallesCarrito', 'productos')));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $direccion = AddressClient::findOrFail($pedido->id_direccion);
        $carritoCliente = Carrito::where('id', $pedido->id_carrito)->first();
        $detallesCarritos = DetalleCarrito::where('idCarrito', $carritoCliente->id)->paginate(10);
        $productos = producto::get();
        $detallesCarrito = DetalleCarrito::get();
        $carrito = Carrito::where('idCliente', auth()->user()->id);
        $carrito = $carrito->where('estado', 1)->first();
        return (view('cliente.pedidos.show', compact('pedido', 'carritoCliente', 'detallesCarritos', 'productos', 'detallesCarrito', 'carrito', 'direccion')));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Factura
        $factura = factura::where('id_pedido', $id)->first();
        $user = User::findOrfail($factura->id_cliente);
        $pedido = pedido::findOrFail($factura->id_pedido);
        $pago = Pago::findOrfail($pedido->id_pago);
        $tipoPago = TipoPago::findOrFail($pago->id_tipoPago);
        $productos = producto::get();
        $carrito = Carrito::findOrFail($pedido->id_carrito);
        $detallesCarritos = DetalleCarrito::get()->where('idCarrito', $carrito->id);
        return view('administrador.gestionar_pedidos.factura', compact('factura', 'user', 'tipoPago', 'productos', 'detallesCarritos', 'pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
