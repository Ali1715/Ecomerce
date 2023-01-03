<?php

namespace App\Http\Controllers;

use App\Models\marca;
use App\Models\Persona;
use App\Models\Bitacora;
use App\Models\producto;
use App\Models\categoria;
use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

date_default_timezone_set('America/La_Paz');

class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('can:producto.index', ['only' => 'index']);
        $this->middleware('can:producto.create', ['only' => ['create', 'store']]);
        $this->middleware('can:producto.update', ['only' => ['edit', 'update']]);
        $this->middleware('can:producto.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::paginate(10);
        $marcas = marca::get();
        $categorias = categoria::get();
        return view('administrador.gestionar_producto.index', compact('productos', 'marcas', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::get();
        $marcas = marca::get();
        $promociones = Promocion::get();
        return view('administrador.gestionar_producto.create', compact('categorias', 'marcas', 'promociones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $producto = producto::create($request->validated());
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('public/img/', $filename);
            $producto->imagen = $filename;
        }
        if ($request->idpromocion != '') {
            $producto->idpromocion = $request->idpromocion;
        }
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
        $action = "Creó un registro de un Producto";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect('administrador/producto')->with('message', 'Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = producto::findOrFail($id);
        $categorias = categoria::get();
        $marcas = marca::get();
        $promociones = Promocion::get();
        return view('administrador.gestionar_producto.edit', compact('producto', 'categorias', 'marcas', 'promociones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = producto::findOrFail($id);
        $producto->update($request->validated());
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('public/img/', $filename);
            $producto->imagen = $filename;
        }
        if ($request->idpromocion != '') {
            $producto->idpromocion = $request->idpromocion;
        }
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
        $action = "Editó un registro de un Producto";
        $bitacora = Bitacora::create();
        $bitacora->tipou = $tipo;
        $bitacora->name = $user->name;
        $bitacora->actividad = $action;
        $bitacora->fechaHora = date('Y-m-d H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->save();
        //---------------
        return redirect('administrador/producto')->with('message', 'Actualizado exitosamente');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = Request::capture();
        $producto = producto::findOrFail($id);
        try {
            $producto->delete();
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
            $action = "Eliminó un registro de un Producto";
            $bitacora = Bitacora::create();
            $bitacora->tipou = $tipo;
            $bitacora->name = $user->name;
            $bitacora->actividad = $action;
            $bitacora->fechaHora = date('Y-m-d H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->save();
            //---------------
            return redirect('administrador/producto')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect('administrador/producto')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
