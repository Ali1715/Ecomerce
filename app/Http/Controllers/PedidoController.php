<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Bitacora;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\factura;
use App\Models\Pago;
use App\Models\Persona;
use App\Models\producto;
use App\Models\TipoPago;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

date_default_timezone_set('America/La_Paz');

class PedidoController extends Controller
{
    function __construct()
    {
        $this->middleware('can:pedidos.index', ['only' => 'index']);
        $this->middleware('can:pedidos.show', ['only' => 'show']);
        $this->middleware('can:pedidos.update', ['only' => ['edit', 'update']]);
        $this->middleware('can:pedidos.factura', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::paginate(10);
        return (view('administrador.gestionar_pedidos.index', compact('pedidos')));
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
     * @param  \App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $carrito = Carrito::findOrFail($pedido->id_carrito);
        $detallesCarritos = DetalleCarrito::where('idCarrito', $carrito->id)->paginate(10);
        $productos = producto::get();
        return (view('administrador.gestionar_pedidos.show', compact('detallesCarritos', 'productos')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('administrador.gestionar_pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->validated());
        if($request->estado == 'Cancelado'){
            $productos = producto::get();
            $detallesCarrito = DetalleCarrito::get()->where('idCarrito', $pedido->id_carrito);
            foreach($detallesCarrito as $detalleCarrito){
                foreach($productos as $producto){
                    if($detalleCarrito->idProducto == $producto->id){
                        $prod = producto::findOrFail($producto->id);
                        $prod->stock = $prod->stock + $detalleCarrito->cantidad;
                        $prod->save();
                    }
                }
            }
        }
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
        $action = "Actualizó un pedido";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return redirect('administrador/pedidos')->with('message', 'Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
        //Bitacora
        $request = Request::capture();
        $id2 = Auth::id();
        $user = Persona::where('iduser', $id2)->first();
        $tipo = "default";
        if ($user->tipoe == 1) {
            $tipo = "Empleado";
        }
        if ($user->tipoc == 1) {
            $tipo = "Cliente";
        }
        $action = "Generó una factura de un pedido";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //----------
        return view('administrador.gestionar_pedidos.factura', compact('factura', 'user', 'tipoPago', 'productos', 'detallesCarritos', 'pago'));
    }

}
