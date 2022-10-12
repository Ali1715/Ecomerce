<?php

namespace App\Http\Controllers;

use App\Models\detallenotaingreso;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Http\Controllers\ProductoController;
use App\Http\Requests\ProductoFormRequest;
use App\Models\notaingreso;
use Illuminate\Support\Facades\DB;

class DetallenotaingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('administrador.gestionar_notaingreso.agregardetalle');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */
    public function agregar(producto $dato, notaingreso $datonota)
    {
        return view('administrador.gestionar_detallenotaingreso.agregar', compact('dato','datonota'));
    }


    public function guardar($dato1, $dato2)
    {
       
 
        $dato = new detallenotaingreso();
        $dato->idnota='idnota';
        $dato->idproducto=$dato2;
        $dato->cantidad='cantidad';
        $dato->costo='costo';
        $dato->total='costo' * 'cantidad';
       

        $dato->save();

        return redirect('administrador/notaingreso/agregar')->with('message','Guardado exitosamente');
    }

    public function listar(notaingreso $datoidnota)
    {
         $datonota= 'datoidnota';
        $datos = DB::table('producto')->orderBy('id')
            ->join('marca', 'marca.id', '=', 'producto.idmarca')
        
            ->select('producto.id', 'producto.name', 'producto.descripcion','producto.precioStock','producto.precioUnitario','marca.nombre')
            ->get();
      
     
         return view('administrador.gestionar_detallenotaingreso.listaproducto', compact('datos','datonota'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(detallenotaingreso $detallenotaingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detallenotaingreso $detallenotaingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detallenotaingreso  $detallenotaingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(detallenotaingreso $detallenotaingreso)
    {
        //
    }
}
