<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('producto')->orderBy('id')
            ->join('marca', 'marca.id', '=', 'producto.idmarca')
        
            ->select('producto.id', 'producto.name', 'producto.descripcion','producto.precioStock','producto.precioUnitario','marca.nombre')
            ->get();
      
         return view('administrador.gestionar_producto.index',['dato'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.gestionar_producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        $validatedDaata=$request->validated();
 
        $dato = new Producto;
        $dato->name=$validatedDaata['nombre'];
        $dato->descripcion=$validatedDaata['descripcion'];
        $dato->precioStock=$validatedDaata['costo'];
        $dato->precioUnitario=$validatedDaata['precio'];
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;

            $file->move('public/img/',$filename);

            $dato->imagen=$filename;
        }
        
        $dato->idmarca=$validatedDaata['marca'];
        $dato->idcategoria=$validatedDaata['categoria'];

        $dato->save();

        return redirect('administrador/producto')->with('message','Guardado exitosamente');
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
        return view('administrador.gestionar_producto.edit', compact('dato'));
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
        $validatedDaata=$request->validated();
        $dato=producto::findOrfail($dato);

     
        $validatedDaata=$request->validated();
 
      
        $dato->name=$validatedDaata['nombre'];
        $dato->descripcion=$validatedDaata['descripcion'];
        $dato->precioStock=$validatedDaata['costo'];
        $dato->precioUnitario=$validatedDaata['precio'];
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;

            $file->move('public/img/',$filename);

            $dato->imagen=$filename;
        }
        
        $dato->idmarca=$validatedDaata['marca'];
        $dato->idcategoria=$validatedDaata['categoria'];

    

        $dato->update();

        return redirect('administrador/producto')->with('message','Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
       //
    }
}
