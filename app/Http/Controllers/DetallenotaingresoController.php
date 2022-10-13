<?php

namespace App\Http\Controllers;

use App\Models\detallenotaingreso;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Http\Controllers\ProductoController;
use App\Http\Requests\ProductoFormRequest;
use App\Models\detallenotabaja;
use App\Models\notaingreso;
use Illuminate\Support\Facades\DB;

class DetallenotaingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idnota)
    {
        $datos = DB::table('detallenotaingresos')->where('idnota', $idnota)
        ->join('productos', 'productos.id', '=', 'detallenotaingresos.idproducto')
     
        ->select('productos.name','detallenotaingresos.idproducto','detallenotaingresos.idnota','detallenotaingresos.cantidad','detallenotaingresos.costo', 'detallenotaingresos.total')
        ->get();
  
        return view('administrador.gestionar_detallenotaingreso.detallenotaingreso',['dato'=>$datos,'idnota'=>$idnota]);
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

    public function listar($idnota)
    {
         $datonota= $idnota;
        $datos = DB::table('productos')->orderBy('id')
            ->join('marcas', 'marcas.id', '=', 'productos.idmarca')
        
            ->select('productos.id', 'productos.name', 'productos.descripcion','productos.precioStock','productos.precioUnitario','marcas.nombre')
            ->get();
      
     
         return view('administrador.gestionar_detallenotaingreso.listaproducto', compact('datos','datonota'));
     
    }
    public function create( $idnota)
    {
   
       
        $dato = new detallenotaingreso();
        $dato->idnota=$idnota;
       
        $dato->save();

      

        return redirect('administrador/detallenotaingreso/listaproducto')->with('message','Agregar producto necesariamente');
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
    public function update(Request $request, $idnota,  $dato)
    {

     
       
        $datos = detallenotaingreso::where("idnota", '=', $idnota, "idproducto",'=',$dato);
        
        $datos->cantidad=['cantidad'];
        $datos->costo=['costo'];
        $datos->total=[00];
        $datos->update();

        return redirect('administrador/notaingreso/'.$idnota.'/agregardetalle')->with('message','Actualizado exitosamente');
    }

   public function add($idnota,$idproducto)
    {


    
        $dato = new detallenotaingreso();
        $dato->idnota=$idnota;
        $dato->idproducto=$idproducto;
        $dato->total=00;

        $dato->save();

        return redirect('administrador/detallenotaingreso/'.$idnota.'/agregar')->with('message','Agregar producto necesariamente');
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
