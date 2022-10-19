<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoFormRequest;
use App\Models\Bitacora;
use App\Models\categoria;
use App\Models\marca;
use App\Models\Persona;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('America/La_Paz');

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('productos')->orderBy('id')
            ->join('marcas', 'marcas.id', '=', 'productos.idmarca')

            ->select('productos.id', 'productos.name', 'productos.descripcion', 'productos.stock', 'productos.precioUnitario', 'marcas.nombre')
            ->get();

        return view('administrador.gestionar_producto.index', ['dato' => $datos]);
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
        return view('administrador.gestionar_producto.create', compact('categorias', 'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        //dd($request->all());
        $validatedDaata = $request->validated();

        $dato = new Producto;
        $dato->name = $validatedDaata['nombre'];
        $dato->descripcion = $validatedDaata['descripcion'];
        $dato->stock = 0;
        $dato->precioUnitario = $validatedDaata['precio'];
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('public/img/', $filename);

            $dato->imagen = $filename;
        }

        $dato->idmarca = $validatedDaata['idmarca'];
        $dato->idcategoria = $validatedDaata['idcategoria'];

        $dato->save();

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
    public function edit(producto $dato)
    {
        $categorias = categoria::get();
        $marcas = marca::get();
        return view('administrador.gestionar_producto.edit', compact('dato', 'categorias', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoFormRequest $request,  $dato)
    {
        $validatedDaata = $request->validated();
        $dato = producto::findOrfail($dato);

        $validatedDaata = $request->validated();

        $dato->name = $validatedDaata['nombre'];
        $dato->descripcion = $validatedDaata['descripcion'];
        $dato->stock = $request->stock;
        $dato->precioUnitario = $validatedDaata['precio'];
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('public/img/', $filename);

            $dato->imagen = $filename;
        }

        $dato->idmarca = $validatedDaata['idmarca'];
        $dato->idcategoria = $validatedDaata['idcategoria'];

        $dato->update();

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
            $bitacora->save();
            //----------
            return redirect('administrador/producto')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect('administrador/producto')->with('danger', 'Datos relacionados con otras tablas, imposible borrar datos.');
        }
    }
}
