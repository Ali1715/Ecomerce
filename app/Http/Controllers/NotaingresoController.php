<?php

namespace App\Http\Controllers;

use App\Models\notaingreso;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductoController;
use App\Http\Requests\ProductoFormRequest;
use App\Models\producto;
use Illuminate\Support\Facades\DB;


class NotaingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('notaingreso')
        ->join('persona', 'persona.id', '=', 'notaingreso.idempleado')
    ->latest('created_at')
        ->select('notaingreso.id', 'notaingreso.created_at', 'notaingreso.total','persona.name')
        ->get();
  
     return view('administrador.gestionar_notaingreso.index',['dato'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
 
        $dato = new notaingreso();
        
        $dato->total=00;
      
 
        $dato->save();

        return redirect('administrador/notaingreso/agregar')->with('message','Guardado exitosamente');
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
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function agregar()
    {
        $datos = DB::table('producto')
        ->select('id', 'name')
        ->get();
  
     return view('administrador.gestionar_notaingreso.agregar',['dato'=>$datos]);
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(notaingreso $notaingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notaingreso $notaingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notaingreso  $notaingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(notaingreso $notaingreso)
    {
        //
    }
    public function newnota(notaingreso $dato)
    
    {
       
            return view('administrador.gestionar_notaingreso.agregar', compact('dato'));
 
    }
}
